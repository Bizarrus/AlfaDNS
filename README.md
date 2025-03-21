# AlfaDNS
Helper class for the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS to automatically read/write nameserver entries for domains. 

This project is used, for example, with the Library [GitHub: skoerfgen/ACMECert](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.

This project was created because ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.

#### Original Webinterface
![AlfaDNS](https://github.com/Bizarrus/AlfaDNS/blob/main/Examples/AlfaDNS.png?raw=true)

# Usage
```!php
$dns =  new AlfaDNS('<username>', '<password>');

$domains = $dns->getDomains($limit = 10, $page = 1);

$recods = $dns->getRecords($domain_id, $type = '*');

$domain = $dns->getDomain($name);

$domain_id = $dns->getDomainID($name);
```

# Examples
| Typ | Description | Example |
|---|---|---|
| Authentification | Authentication takes place via the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS server account. | [Read](Examples/Auth.md) |
| Domains | Retrieves the domains entered in the name server and their IDs. | [Read](Examples/Domains.md) |
| Records | Receives all DNS entries for a specific domain. | [Read](Examples/Records.md) |
| Record: Get | Get a DNS record. | [Read](Examples/Record.Get.md) |
| Record: Create | Create a DNS record. | [Read](Examples/Record.Create.md) |
| Record: Update | Update a DNS record. | [Read](Examples/Record.Update.md) |
| Record: Delete | Deletes a DNS record. | [Read](Examples/Record.Delete.md) |

# Extended Examples
| Typ | Description | Example |
|---|---|---|
| ACME: Challenges | Receives all ACME challenge DNS entries for a specific domain. | [Read](Examples/ACME.List.md) |
| ACME: Renewal | Renewal-Process for Wildcard-Certificates with `Let's Encrypt` over ACME challenge DNS entries for a specific domain. | [Read](Examples/ACME.Renewal.md) |

