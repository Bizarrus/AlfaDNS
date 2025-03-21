
# `\AlfaDNS\AlfaDNS`

Helper class for the Alfahosting DNS to automatically read/write nameserver entries for domains.

This project is used, for example, with the Library GitHub: skoerfgen/ACMECert to automatically renew Let's Encrypt wildcard certificates.
This project was created because Alfahosting does not offer an interface for the DNS server for normal customers and the SOAP interface is only available from the Name 500 package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.




## Methods


```php
public AlfaDNS::__construct(string $username, string $password): mixed
```





The Constructor of the Class.
Authentication takes place via the Alfahosting DNS server account.

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |


**Return Value:**





---

```php
public AlfaDNS::getDomains(int $limit = 10, int $page = 1): array
```





Retrieves the domains entered in the name server and their IDs.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | Maximum of domains in the list |
| `page` | **int** | The page of the List |


**Return Value:**





---

```php
public AlfaDNS::getDomain(string $name): object
```





Get the Domain data by the name.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---

```php
public AlfaDNS::getDomainID(string $name): int
```





Get the unique ID of an Domain


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---

```php
public AlfaDNS::getRecords(mixed $domain, string $type = &#039;*&#039;, string $name = &#039;*&#039;): array
```





Receives all DNS entries for a specific domain.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **mixed** |  |
| `type` | **string** | The Record type (*, A, AAAA, CNAME, HINFO, MX, NAPTR, NS, RP, SRV, TXT) |
| `name` | **string** | The Domain name |


**Return Value:**





---

```php
public AlfaDNS::getRecord(mixed $domain, string $type = &#039;*&#039;, string $name): object|null
```





Get a DNS record.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **mixed** |  |
| `type` | **string** | The Record type (*, A, AAAA, CNAME, HINFO, MX, NAPTR, NS, RP, SRV, TXT) |
| `name` | **string** | The Record name |


**Return Value:**





---

```php
public AlfaDNS::updateRecord(string $domain, string $record, string $value, string $prio, string $ttl = 60): mixed
```





Update a DNS record.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |
| `value` | **string** | The new value of the Record |
| `prio` | **string** | The new priority of the Record |
| `ttl` | **string** | The new ttl of the Record |


**Return Value:**





---

```php
public AlfaDNS::createRecord(string $domain, string $name, string $type, string $value, string $prio, string $ttl = 60): mixed
```





Create a DNS record.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `name` | **string** | The Record name |
| `type` | **string** | The Record type (*, A, AAAA, CNAME, HINFO, MX, NAPTR, NS, RP, SRV, TXT) |
| `value` | **string** | The new value of the Record |
| `prio` | **string** | The new priority of the Record |
| `ttl` | **string** | The new ttl of the Record |


**Return Value:**





---

```php
public AlfaDNS::deleteRecord(string $domain, string $record): mixed
```





Deletes a DNS record.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |


**Return Value:**





---


