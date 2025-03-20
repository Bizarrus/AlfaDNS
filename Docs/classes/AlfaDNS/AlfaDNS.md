
# AlfaDNS





* Full name: `\AlfaDNS\AlfaDNS`



## Methods

### __construct



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
### call



```php
private AlfaDNS::call(string $action, array $data = null, array $headers = [], array $cookies = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |
| `cookies` | **array** | Additional Cookies for the Request |


**Return Value:**





---
### ajax



```php
private AlfaDNS::ajax(string $action, array $data = null): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |


**Return Value:**





---
### form



```php
private AlfaDNS::form(string $action, array $data = null, array $headers = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |


**Return Value:**





---
### login



```php
protected AlfaDNS::login(string $username, string $password): bool
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |


**Return Value:**





---
### getDomains



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
### getDomain



```php
public AlfaDNS::getDomain(string $name): object
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---
### getDomainID



```php
public AlfaDNS::getDomainID(string $name): int
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |


**Return Value:**





---
### getRecords



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
### getRecord



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
### updateRecord



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
### createRecord



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
### deleteRecord



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


