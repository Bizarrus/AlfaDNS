<?php
	use AlfaDNS\AlfaDNS;
	
	$dns		=  new AlfaDNS('<username>', '<password>');
	$records	= $dns->getRecords('example.com', 'TXT');
	$challenges	= [];
	
	foreach($records AS $record) {
		if($record->name === '_acme-challenge.example.com') {
			$challenges[] = $record;
		}
	}
	
	print_r($challenges);
?>