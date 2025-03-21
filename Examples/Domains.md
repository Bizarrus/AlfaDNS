# Domains
Retrieves the domains entered in the name server and their IDs.

# Example
A Full Example can be found on [Domains.php](Domains.php).

```php
$dns		= new AlfaDNS('<username>', '<password>');
$domains	= $dns->getDomains();

print_r($domains);
```

# Result
```python
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

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7
