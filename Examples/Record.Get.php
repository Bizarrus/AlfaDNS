<?php
	use AlfaDNS\AlfaDNS;
	
	$dns =  new AlfaDNS('<username>', '<password>');
	
	$record = $dns->getRecord('example.com', 'TXT', '_acme-challenge.example.com');
	print_r($record);
?>