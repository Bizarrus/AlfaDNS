# Record: Create
Create a DNS record.

# Example
A Full Example can be found on [Record.Create.php](Record.Create.php).

```php
$dns		= new AlfaDNS('<username>', '<password>');

$dns->createRecord('example.com', '_acme-challenge.example.com', 'TXT', 'NEWVALUE' . time(), 0, 60);
```

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7
