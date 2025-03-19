<?php
	use AlfaDNS\AlfaDNS;
	
	$dns =  new AlfaDNS('<username>', '<password>');
	
	$domains = $dns->getDomains();
	print_r($domains);
?>