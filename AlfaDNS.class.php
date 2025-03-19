<?php
	namespace AlfaDNS;
	
	class AlfaDNS {
		private $url		= 'https://dns.alfahosting.de';
		private $cookies	= [];
		private $token		= null;
		
		public function __construct($username, $password) {
			$this->cookies['PHPSESSID']	= bin2hex(random_bytes(13));
			
			$this->login($username, $password);
		}
		
		private function call($action, $data = null, $headers = [], $cookies = []) {
			$request				= curl_init();
			$headers				= array_merge([
				sprintf('Cookie: %s',		http_build_query(array_merge($this->cookies, $cookies), '', ';')),
				sprintf('Origin: %s',		$this->url),
				sprintf('Referer: %s/s%s',	$this->url, $action)	
			], $headers);
			
			curl_setopt($request, CURLOPT_URL,				sprintf('%s/%s', $this->url, $action));
			curl_setopt($request, CURLOPT_RETURNTRANSFER,	true);
			curl_setopt($request, CURLOPT_HEADER,			true);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION,	true);
			curl_setopt($request, CURLOPT_HTTPHEADER,		$headers);
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER,	true);

			if($data !== null) {
				curl_setopt($request, CURLOPT_POST, true);
				
				if(!empty(array_filter($headers, function($header) {
					return strpos(strtolower($header), 'json') !== false;
				}))) {
					curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($data));					
				} else {
					curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($data));					
				}
			}
			
			$response	= curl_exec($request);
			$size		= curl_getinfo($request, CURLINFO_HEADER_SIZE);
			$content	= substr($response, $size);
			$headers	= [];
			$token		= null;
			$document	= null;
			
			foreach(explode(PHP_EOL, substr($response, 0, $size)) AS $header) {
				if(!preg_match('/^([^:]+):(.*)$/', $header, $output)) {
					continue;
				}
				
				$headers[$output[1]] = $output[2];
			}
			
			if(isset($headers['Set-Cookie'])) {
				parse_str(strtr($headers['Set-Cookie'], [
					'&' => '%26',
					'+' => '%2B',
					';' => '&'
				]), $cookies);
				
				if(array_key_exists('PHPSESSID', $cookies)) {
					$this->cookies['PHPSESSID']	= $cookies['PHPSESSID'];
				}
			
				if(array_key_exists('YII_CSRF_TOKEN', $cookies)) {
					$this->cookies['YII_CSRF_TOKEN'] = $cookies['YII_CSRF_TOKEN'];
				}
				
				foreach(array_filter(array_keys($cookies), function($key) {
					return preg_match('/^[a-f0-9]{32}$/', $key);
				}) AS $hash) {
					$this->cookies[$hash] = $cookies[$hash];
				}
			}
			
			/* Check if Output is JSON */
			if(json_validate($content)) {
				$document = $content;
				
			/* Find CSRF-Token */
			} else if(!empty($content)) {
				$document	= new \DOMDocument();
				
				$document->loadHTML($content, LIBXML_NOERROR);
				$params 	= $document->getElementsByTagName('input');
				
				foreach($params AS $param) {
					if(strtoupper($param->getAttribute('name')) === 'YII_CSRF_TOKEN') {
						$token			= $param->getAttribute('value');
						$this->token	= $token;
					}
				}
			}
			
			return [
				$headers, $document, $token
			];
		}
		
		private function ajax($action, $data = null) {
			list($headers, $request) = $this->call($action, $data, [
				'Accept: application/json, text/javascript, */*; q=0.01',
				'X-Requested-With: XMLHttpRequest'
			]);
			
			try {
				$json = json_decode($request);
				
				return $json;				
			} catch(\Exception $e) {
				/* Do Nothing */
			}
			
			return null;
		}
		
		private function form($action, $data = null, $headers = []) {
			return $this->call($action, $data, array_merge([
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0'
			], $headers));
		}
		
		private function unserialize($data) {
			preg_match('/^(.+):(\d+):"(.*)";$/', $data, $matches);

			if($matches) {
				return (object) [
					'name'		=> $matches[1],
					'value'		=> $matches[3],
					'length'	=> (int) $matches[2]
				];
			}
			
			return null;
		}
		
		public function login($username, $password) {
			list($headers, $document, $token) = $this->call('/site/login');
			
			if(empty($token)) {
				throw new \Exception('Can\'t find YII_CSRF_TOKEN!');
			}
			
			/* Find Login-Form Elements */
			$login_username = $document->getElementById('LoginForm_username');
			$login_password = $document->getElementById('LoginForm_password');
			$login_button	= $document->getElementById('login-submit');
			
			list($headers, $document, $token) = $this->form('/site/login', [
				'YII_CSRF_TOKEN'						=> $token,
				$login_username->getAttribute('name')	=> $username,
				$login_password->getAttribute('name')	=> $password,
				$login_button->getAttribute('name')		=> $login_button->getAttribute('value')
			]);
			
			$content = str_replace(PHP_EOL, '', strip_tags($document->saveHTML()));
			
			if(str_contains($content, 'Fehler aufgetreten')) {
				throw new \Exception('Unknown Request Error on sign in process.');
			}
			
			if(!isset($headers['Location'])) {
				throw new \Exception('Can\'t sign in.');
			}
			
			return true;
		}
		
		public function getDomains($limit = 10, $page = 1) {
			$domains	= [];
			$json		= $this->ajax(sprintf('/soa/index?%s', http_build_query([
				'_search'	=> 'false',
				'nd'		=> time(),
				'rows'		=> $limit,
				'page'		=> $page,
				'sidx'		=> 'name',
				'sord'		=> 'asc'
			])));
			
			foreach($json->rows AS $domain) {
				$domains[] = (object) [
					'id'	=> (int) $domain->id,
					'name'	=> trim(html_entity_decode(str_replace('&nbsp;', '', strip_tags($domain->cell[0]))))
				];
			}			
		
			return $domains;
		}
		
		public function getDomain($name) {
			$name		= trim(strtolower($name));
			$domains	= $this->getDomains(9999999);
			$domain		= null;
			
			foreach($domains AS $entry) {
				if($entry->name === $name) {
					$domain = $entry;
				}
			}
			
			if(empty($domain)) {
				throw new \Exception(sprintf('Domain not Found: %s', $name));
			}
			
			return $domain;
		}
		
		public function getDomainID($name) {
			return $this->getDomain($name)->id;
		}
		
		/*
			*, TXT, NS, A,
		*/
		public function getRecords($domain, $type = '*', $name = '*') {
			if(is_string($domain)) {
				$domain = $this->getDomainID($domain);
			}
			
			$json		= $this->ajax(sprintf('/rr/index/soa/%s', $domain));
			$records	= [];
			
			foreach($json->rows AS $rows) {
				if($rows->id === 'new') {
					continue;
				}
				
				if($type !== '*' && $rows->cell[1] !== $type) {
					continue;
				}
				
				if($name !== '*' && $rows->cell[0] !== $name) {
					continue;
				}
				
				$records[] = (object) [
					'id'		=> (int) $rows->id,
					'name'		=> $rows->cell[0],
					'type'		=> $rows->cell[1],
					'value'		=> $rows->cell[2],
					'priority'	=> $rows->cell[3],
					'ttl'		=> $rows->cell[4],
				];
			}
			
			return $records;
		}
		
		public function getRecord($domain, $type = '*', $name) {
			$records	= $this->getRecords($domain, $type, $name);
			$record		= null;
			
			foreach($records AS $entry) {
				if($type !== '*' && $entry->type !== $type) {
					continue;
				}
				
				if($entry->name !== $name) {
					continue;
				}
				
				print_r($entry);
				
				$record = $entry;
			}
			
			return $record;
		}
		
		public function updateRecord($domain, $name, $type, $value, $prio = 0, $ttl = 60) {
			$domain_id							= $this->getDomainID($domain);
			$record								= $this->getRecord($domain_id, $type, $name);
			list($headers, $document, $token)	= $this->form(sprintf('/rr/record/soa/%d', $domain_id), [
				'id'				=> $record->id,
				'type'				=> $record->type,
				'name'				=> $record->name,
				'content'			=> $value,
				'prio'				=> $prio,
				'ttl'				=> $ttl,
				'YII_CSRF_TOKEN'	=> $this->token,
			], [
				'x-requested-with: XMLHttpRequest'
			]);		
		}
		
		public function createRecord($domain, $name, $type, $value, $prio = 0, $ttl = 60) {
			$domain_id							= $this->getDomainID($domain);
			list($headers, $document, $token)	= $this->form(sprintf('/rr/record/soa/%d', $domain_id), [
				'id'				=> 'new',
				'type'				=> $type,
				'name'				=> $name,
				'content'			=> $value,
				'prio'				=> $prio,
				'ttl'				=> $ttl,
				'YII_CSRF_TOKEN'	=> $this->token,
			], [
				'x-requested-with: XMLHttpRequest'
			]);		
		}
		
		public function deleteRecord($domain, $record) {
			$domain_id							= $this->getDomainID($domain);
			
			list($headers, $document, $token)	= $this->form(sprintf('/rr/record/soa/%d', $domain_id), [
				'oper'				=> 'del',
				'id'				=> $record->id,
				'YII_CSRF_TOKEN'	=> $this->token,
			], [
				'x-requested-with: XMLHttpRequest'
			]);		
		}
	}
?>