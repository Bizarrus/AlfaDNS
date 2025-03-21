# ACME: List
Receives all ACME challenge DNS entries for a specific domain.

I recommend the library [:octocat:`skoerfgen/ACMECert`](https://github.com/skoerfgen/ACMECert), if you want to request `Let's Encrypt` certificates via ACME challenges over DNS.

# Example
A Full Example can be found on [ACME.List.php](ACME.List.php).

```php
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
```python
Array (
    [0] => Object (
         [id]		=> 123456788
         [name]		=> _acme-challenge.example.com
         [type]		=> TXT
         [value]	=> abcdefghijhlmnopqrstuvwxyz1234567890
         [priority]	=> 0
         [ttl]		=> 60
    )

    [1] => Object (
         [id]		=> 123456789
         [name]		=> _acme-challenge.example.com
         [type]		=> TXT
         [value]	=> abcdefghijhlmnopqrstuvwxyz1234567890
         [priority]	=> 0
         [ttl]		=> 60
    )
)
```

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7
