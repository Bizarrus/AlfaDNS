<?php
	use AlfaDNS\AlfaDNS;
	
	$dns		=  new AlfaDNS('<username>', '<password>');
	$records	= $dns->getRecords('example.com', 'TXT');
	
	foreach($records AS $record) {
		$dns->updateRecord('example.com', $record, 'NEWVALUE-' . time(), 0, 60);
	}
?>