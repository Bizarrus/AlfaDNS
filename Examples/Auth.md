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
