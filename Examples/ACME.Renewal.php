<?php
	use AlfaDNS\AlfaDNS;
	use skoerfgen\ACMECert\ACMECert;
	
	$domain		= 'example.com';
	$days		= 5; // When should the certificate be renewed?
	$test		= true; // DEMO-Mode on Let's Encrypt
	$acme		= new ACMECert('https://' . ($test ? 'acme-staging-v02' : 'acme-v02') . '.api.letsencrypt.org/directory');
	$dns		= new AlfaDNS('<username>', '<password>');
	$records	= $dns->getRecords($domain, 'TXT');
	
	$account	= null;
	$key		= null;
	$emails		= [
		sprintf('abuse@%s', $domain)
	];
		
	// ################ Initial Let's Encrypt Process
		/* Let's Encrypt: Key */
		if(!file_exists('LetsEncrypt.key')) {
			$key = $acme->generateRSAKey(2048);
			file_put_contents('LetsEncrypt.key', $key);
		} else {
			$key = file_get_contents('LetsEncrypt.key');
		}
		
		/* Let's Encrypt: Account */
		if(!file_exists('LetsEncrypt.account')) {
			file_put_contents('file:////LetsEncrypt.account', $acme->generateRSAKey(2048));
			$acme->loadAccountKey('file:////LetsEncrypt.account');
			
			printf("\033[1;34mCreate Account with E-Mails: [%s]\033[39m", implode(', ', $emails));
			print PHP_EOL;
			
			$account = $acme->register(true, $emails);
		} else {
			try {
				$acme->loadAccountKey('file:////LetsEncrypt.account');
				
				$account = $acme->getAccount();
				
				printf("\033[1;34mLoad Account: [%s]\033[39m", implode(', ', $account['contact']));
				print PHP_EOL;
			} catch(\Exception $e){
				if($e->getType() == 'urn:ietf:params:acme:error:accountDoesNotExist'){
					print("\033[1;34mError: Account does not exist.\033[39m");
					print PHP_EOL;
					unlink('LetsEncrypt.account');
					return;
				}
			}
		}
	
		printf("\033[1;34mAccount was created on %s and is %s.\033[39m", $account['createdAt'], $account['status']);
		print PHP_EOL;
			
	// ################ Cert Info Process
		$path	= sprintf('/etc/letsencrypt/live/%s', $domain);
		$ssl	= file_get_contents(sprintf('%s/fullchain.pem', $path));
	
		if($ssl === false) {
			printf("\033[1;34mError: Can't read file: %s/fullchain.pem\033[39m", $path);
			print PHP_EOL;
		} else {
			$cert = openssl_x509_parse($ssl);
			
			if($cert === false) {
				printf("\033[1;34mError: Can't parse Cert: %s/fullchain.pem\033[39m", $path);
				print PHP_EOL;
			} else {
				$expiring	= $cert['validTo_time_t'];
				
				/* If Cert is expiring in under 5 days */
				if($expiring < (time() + ($days * 86400))) {
					printf("\033[1;34mCert expiring on %s\033[39m", date('d.m.Y - H:i:s', $expiring));
					print PHP_EOL;
					
					/* Load DNS-Entries */
					$index		= 0;
					$records	= $dns->getRecords($domain, 'TXT');
					$challenges	= [];
					
					foreach($records AS $record) {
						if($record->name === sprintf('_acme-challenge.%s', $domain)) {
							$challenges[] = $record;
						}
					}
					
					/* Create Cert Request */
					$fullchain = $acme->getCertificateChain($key, [
						$domain						=> [ 'challenge' => 'dns-01' ],
						sprintf('*.%s', $domain)	=> [ 'challenge' => 'dns-01' ]
					], function($options) use ($dns, $domain, $challenges, &$index) {
						printf("\033[1;34mOK: Retreive challenge: %s\033[39m", $options['value']);
						print PHP_EOL;
						
						$dns->updateRecord($domain, $challenges[$index++], $options['value'], 0, 60);
						
						print("\033[1;34mWaiting: 5 Seconds for DNS...\033[39m");
						print PHP_EOL;
						usleep(5000);
						
						return function($options) {};
					});
					
					$certificates	= $acme->splitChain($fullchain);
					
					/* Save fullchain */
					file_put_contents(sprintf('%s/fullchain.pem', $path), $fullchain);
					
					/* Save Key */
					file_put_contents(sprintf('%s/privkey.pem', $path), $key);
					
					/* Save Cert */
					file_put_contents(sprintf('%s/cert.pem', $path), $certificates[0]);
					
					/* Save Chain */
					file_put_contents(sprintf('%s/chain.pem', $path), $certificates[1]);
					
					printf("\033[1;34mOK: Cert for %s was successfully saved.\033[39m", $domain);
					print PHP_EOL;
				} else {
					printf("\033[1;34mCert is valid and will be expring on %s\033[39m", date('d.m.Y - H:i:s', $expiring));
					print PHP_EOL;
				}
			}
		}
?>
