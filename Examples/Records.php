<?php
	use AlfaDNS\AlfaDNS;
	
	$dns =  new AlfaDNS('<username>', '<password>');
	
	$records = $dns->getRecords('example.com', 'TXT');
	print_r($records);
?>