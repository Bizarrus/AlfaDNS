<?php
	/*
		1. Log in to https://alfahosting.de/kunden-login/ with your Account
		2. Select your IPID: https://secure.alfahosting.de/kunden/index.php/Kundencenter:Tarife
		3. Use the account from DNS Server Infos!
	*/
	
	use AlfaDNS\AlfaDNS;
	
	$dns =  new AlfaDNS('<username>', '<password>');
?>