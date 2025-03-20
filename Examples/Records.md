# Domains
Receives all DNS entries for a specific domain.

# Example
A Full Example can be found on [Records.php](Records.php).

```!php
$dns		= new AlfaDNS('<username>', '<password>');
$records	= $dns->getRecords('example.com', 'TXT');

print_r($records);
```

# Result
```
Array (
	[0] => stdClass Object (
		[id]		=> 20312345
		[name]		=> _acme-challenge.example.com
		[type]		=> TXT
		[value]		=> TmnjQiiJJSfUbC-0Z2ylXEEurQF27mp50ICQJTwZMPQ
		[priority]	=> 0
		[ttl]		=> 60
	)

	[1] => stdClass Object (
		[id]		=> 20312346
		[name]		=> _acme-challenge.example.com
		[type]		=> TXT
		[value]		=> FaDySnY4gq70uwxYo1oOuAj1kps-2anshsfXA29saRU
		[priority]	=> 0
		[ttl]		=> 60
	)

	[2] => stdClass Object (
		[id]		=> 20312347
		[name]		=> _gh-User-o.example.com
		[type]		=> TXT
		[value]		=> 6a9fa81746
		[priority]	=> 0
		[ttl]		=> 60
	)

	[3] => stdClass Object (
		[id]		=> 20312348
		[name]		=> _gh-User-o.www.example.com
		[type]		=> TXT
		[value]		=> 100b86b52b
		[priority]	=> 0
		[ttl]		=> 60
	)

	[4] => stdClass Object (
		[id]		=> 20312349
		[name]		=> test.example.com
		[type]		=> TXT
		[value]		=> Hello World
		[priority]	=> 0
		[ttl]	=> 60
	)

	[5] => stdClass Object (
		[id] => 20312350
		[name] => _acme-challenge.example.com
		[type] => TXT
		[value] => NEWVALUE1742454677
		[priority] => 0
		[ttl] => 60
	)
)
```
