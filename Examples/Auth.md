# Authentication
Authentication takes place via the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS server account.

# Find Auth-Data
1. **Log in** to [https://alfahosting.de/kunden-login/](https://alfahosting.de/kunden-login/) with your Account
2. Select your **IPID**: [https://secure.alfahosting.de/kunden/index.php/Kundencenter:Tarife](https://secure.alfahosting.de/kunden/index.php/Kundencenter:Tarife)
3. Use the account from **DNS Server Infos**!

![Auth Data](https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/Auth.Data.png?raw=true)

# Example
A Full Example can be found on [Auth.php](Auth.php).

```php
$dns = new AlfaDNS('<username>', '<password>');
```

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7
