# ACME: List
Receives all ACME challenge DNS entries for a specific domain.

I recommend the library [GitHub: skoerfgen/ACMECert](https://github.com/skoerfgen/ACMECert), if you want to request `Let's Encrypt` certificates via ACME challenges over DNS.

# Example
A Full Example can be found on [ACME.List.php](ACME.List.php).

```!php
$dns		= new AlfaDNS('<username>', '<password>');
$records	= $dns->getRecords('example.com', 'TXT');
$challenges	= [];

foreach($records AS $record) {
	if($record->name === '_acme-challenge.example.com') {
		$challenges[] = $record;
	}
}

print_r($challenges);
```

# Result
```
Array (
    [0] => stdClass Object (
		[id]		=> 123456788
		[name]		=> _acme-challenge.example.com
		[type]		=> TXT
		[value]		=> abcdefghijhlmnopqrstuvwxyz1234567890
		[priority]	=> 0
		[ttl]		=> 60
	)

    [1] => stdClass Object (
		[id]		=> 123456789
		[name]		=> _acme-challenge.example.com
		[type]		=> TXT
		[value]		=> abcdefghijhlmnopqrstuvwxyz1234567890
		[priority]	=> 0
		[ttl]		=> 60
	)
)
```
