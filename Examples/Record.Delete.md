# Record: Delete
Deletes a DNS record.

# Example
A Full Example can be found on [Record.Delete.php](Record.Delete.php).

```php
$dns		= new AlfaDNS('<username>', '<password>');
$record		= $dns->getRecord('example.com', 'TXT', '_acme-challenge.example.com');

$dns->deleteRecord('example.com', $record);
```

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7
