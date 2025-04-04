<?php
	/**
	 * AlfaDNS
	 * ▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔
	 * Licensed and copyrighted materials - Property of Adrian Preuß.
	 * © Copyright 2025. All Rights Reserved.
	 *
	 * @version		1.0.0
	 * @author 		Adrian Preuß
	 * @copyright	2025
	 * @license		MIT
	 */
	namespace AlfaDNS;
	
	/**
	  * Helper class for the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS to automatically read/write nameserver entries for domains.
	  * This project is used, for example, with the Library [:octocat:`skoerfgen/ACMECert`](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.
	  * This project was created because ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.
	  *
	  * @namespace	AlfaDNS
	  * @class		AlfaDNS
	*/
	class AlfaDNS {
		private $url		= 'https://dns.alfahosting.de';
		private $cookies	= [];
		private $token		= null;
		
		/**
		  * The Constructor of the Class.
		  * Authentication takes place via the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS server account (See Screenshot: [Examples/Auth.Data.png](https://github.com/Bizarrus/AlfaDNS/raw/main/Examples/Auth.Data.png?raw=true)).
		  *
		  * @method void __construct(string $username, string $password)
		  *
		  * @param string $username The Username
		  * @param string $password The Password
		*/
		public function __construct(string $username, string $password) {
			$this->cookies['PHPSESSID']	= bin2hex(random_bytes(13));
			
			$this->login($username, $password);
		}
		
		/**
		  * Internal call HTTP Request
		  * @method [ $headers, $document, $token ] call(string $action, array $data = null, array $headers = [], array $cookies = [])
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Auth.md Authentication takes place via the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS server account.
		  * @access private
		  *
		  * @param string $action The Action-URL
		  * @param array $data The POST-Data for the Request
		  * @param array $headers Additional Headers for the Request
		  * @param array $cookies Additional Cookies for the Request
		  *
		  * @return [ $headers, $document, $token ]
		*/
		private function call(string $action, array $data = null, array $headers = [], array $cookies = []) : array {
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
		
		/**
		  * @method JSON|null ajax(string $action, array $data = null)
		  * @access private
		  *
		  * @param string $action The Action-URL
		  * @param array $data The POST-Data for the Request
		  *
		  * @return object | null
		*/
		private function ajax(string $action, array $data = null) : object | null {
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
				
		/**
		  * @method [ $headers, $document, $token ] form(string $action, array $data = null, array $headers = [])
		  * @access private
		  *
		  * @param string $action The Action-URL
		  * @param array $data The POST-Data for the Request
		  * @param array $headers Additional Headers for the Request
		  *
		  * @return [ $headers, $document, $token ]
		*/
		private function form(string $action, array $data = null, array $headers = []) : array {
			return $this->call($action, $data, array_merge([
				'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
				'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0'
			], $headers));
		}
		
		/**
		  * @method boolean login(string $username, string $password)
		  * @access protected
		  *
		  * @param string $username The Username
		  * @param string $password The Password
		  *
		  * @throws Exception
		  * @return boolean
		*/
		protected function login(string $username, string $password) : bool {
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
		
		/**
		  * Retrieves the domains entered in the name server and their IDs.
		  *
		  * @method array getDomains(int $limit, int $page)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Domains.md Retrieves the domains entered in the name server and their IDs.
		  *
		  * @param int $limit Maximum of domains in the list
		  * @param int $page The page of the List
		  *
		  * @return array
		*/
		public function getDomains(int $limit = 10, int $page = 1) : array {
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
		
		/**
		  * Get the Domain data by the name.
		  *
		  * @method object getDomain(string $name)
		  *
		  * @param string $name The Domain name
		  *
		  * @return object | null
		*/
		public function getDomain(string $name) : object | null {
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
		
		/**
		  * Get the unique ID of an Domain
		  *
		  * @method int getDomainID(string $name)
		  *
		  * @param string $name The Domain name
		  *
		  * @return int | null
		*/
		public function getDomainID(string $name) : int | null {
			$domain = $this->getDomain($name);
			
			if(empty($domain)) {
				return null;
			}
			
			return $domain->id;
		}
		
		/**
		  * Receives all DNS entries for a specific domain.
		  *
		  * @method array getRecords(string $domain, string $type, string $name)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Records.md Receives all DNS entries for a specific domain.
		  *
		  * @param string | object $domain The Domain name or object
		  * @param string{"*", "A", "AAAA", "CNAME", "HINFO", "MX", "NAPTR", "NS", "RP", "SRV", "TXT"} $type The Record type (<kbd>*</kbd>, <kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)
		  * @param string $name The name of the record
		  *
		  * @return array
		*/
		public function getRecords(string | object $domain, string $type = '*', string $name = '*') : array {
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
		
		/**
		  * Get a DNS record.
		  *
		  * @method object|null getRecord(string $domain, string $type, string $name)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Record.Get.md Get a DNS record.
		  *
		  * @param string|object $domain The Domain name
		  * @param string{"*", "A", "AAAA", "CNAME", "HINFO", "MX", "NAPTR", "NS", "RP", "SRV", "TXT"} $type The Record type (<kbd>*</kbd>, <kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)
		  * @param string $name The Record name
		  *
		  * @return object|null
		*/
		public function getRecord(string | object $domain, string $type = '*', string $name) : object | null {
			$records	= $this->getRecords($domain, $type, $name);
			$record		= null;
			
			foreach($records AS $entry) {
				if($type !== '*' && $entry->type !== $type) {
					continue;
				}
				
				if($entry->name !== $name) {
					continue;
				}
				
				$record = $entry;
			}
			
			return $record;
		}
		
		/**
		  * Update a DNS record.
		  *
		  * @method void updateRecord(string $domain, object $record, string $value, int $prio = 0, int $ttl = 60)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Record.Update.md Update a DNS record.
		  *
		  * @param string $domain The Domain name
		  * @param string $record The Record object
		  * @param string $value The new value of the Record
		  * @param string $prio The new priority of the Record
		  * @param string $ttl The new ttl of the Record
		*/
		public function updateRecord(string $domain, object $record, string $value, int $prio = 0, int $ttl = 60) : void {
			list($headers, $document, $token)	= $this->form(sprintf('/rr/record/soa/%d', $this->getDomainID($domain)), [
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
		
		/**
		  * Create a DNS record.
		  *
		  * @method void createRecord(string $domain, string $name, string $type, string $value, int $prio = 0, int $ttl = 60)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Record.Create.md Create a DNS record.
		  *
		  * @param string $domain The Domain name
		  * @param string $name The Record name
		  * @param string{"A", "AAAA", "CNAME", "HINFO", "MX", "NAPTR", "NS", "RP", "SRV", "TXT"} $type The Record type (<kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)
		  * @param string $value The new value of the Record
		  * @param string $prio The new priority of the Record
		  * @param string $ttl The new ttl of the Record
		*/
		public function createRecord(string $domain, string $name, string $type, string $value, int $prio = 0, int $ttl = 60) {
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
		
		/**
		  * Deletes a DNS record.
		  *
		  * @method void deleteRecord(string $domain, object $record)
		  * @example https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Record.Delete.md Deletes a DNS record.
		  *
		  * @param string $domain The Domain name
		  * @param string $record The Record object
		*/
		public function deleteRecord(string $domain, object $record) : void {
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