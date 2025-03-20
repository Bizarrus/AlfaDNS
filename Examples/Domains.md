# Domains
Retrieves the domains entered in the name server and their IDs.

# Example
A Full Example can be found on [Domains.php](Domains.php).

```!php
$dns		= new AlfaDNS('<username>', '<password>');
$domains	= $dns->getDomains();

print_r($domains);
```

# Result
```
Array (
	[0] => stdClass Object (
		[id]	=> 700051
		[name]	=> example.com
	)

	[1] => stdClass Object (
		[id]	=> 700052
		[name]	=> example.net
	)

	[2] => stdClass Object (
		[id]	=> 700053
		[name]	=> example.info
	)

	[3] => stdClass Object (
		[id]	=> 700054
		[name]	=> example.org
	)
)
```
