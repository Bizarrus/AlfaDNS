<?php
	use AlfaDNS\AlfaDNS;
	
	$dns =  new AlfaDNS('<username>', '<password>');
	
	$dns->createRecord('example.com', '_acme-challenge.example.com', 'TXT', 'NEWVALUE' . time(), 0, 60);
?>