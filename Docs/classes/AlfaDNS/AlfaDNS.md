
# AlfaDNS





* Full name: `\AlfaDNS\AlfaDNS`



## Methods

The Constructor of the Class.

```php
public AlfaDNS::__construct(string $username, string $password): mixed
```






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






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---


```php
public AlfaDNS::getDomainID(string $name): int
```






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---


```php
public AlfaDNS::getRecords(mixed $domain, string $type = &#039;*&#039;, string $name = &#039;*&#039;): array
```






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






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |


**Return Value:**





---


