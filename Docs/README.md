
# `\AlfaDNS\AlfaDNS`

Helper class for the Alfahosting DNS to automatically read/write nameserver entries for domains.

This project is used, for example, with the Library [GitHub: skoerfgen/ACMECert](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.
This project was created because Alfahosting does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.




## Methods
> [`__construct(string : $username, string : $password) : void`](#__construct)
> 
> [`getDomains(int : $limit = 10, int : $page = 1) : array`](#getDomains)
> 
> [`getDomain(string : $name) : object|null`](#getDomain)
> 
> [`getDomainID(string : $name) : int|null`](#getDomainID)
> 
> [`getRecords(string|object : $domain, string : $type = &#039;*&#039;, string|object : $name = &#039;*&#039;) : array`](#getRecords)
> 
> [`getRecord(string : $domain, string : $type = &#039;*&#039;, string : $name) : object|null`](#getRecord)
> 
> [`updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60) : void`](#updateRecord)
> 
> [`createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60) : mixed`](#createRecord)
> 
> [`deleteRecord(string : $domain, string : $record) : void`](#deleteRecord)
> 

---
### <a name="__construct">
```php
public __construct(string : $username, string : $password) : void
```
</a>




The Constructor of the Class.
Authentication takes place via the Alfahosting DNS server account.

#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |





---
### <a name="getDomains">
```php
public getDomains(int : $limit = 10, int : $page = 1) : array
```
</a>




Retrieves the domains entered in the name server and their IDs.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | Maximum of domains in the list |
| `page` | **int** | The page of the List |



#### Returns: `array`


---
### <a name="getDomain">
```php
public getDomain(string : $name) : object|null
```
</a>




Get the Domain data by the name.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `object|null`


---
### <a name="getDomainID">
```php
public getDomainID(string : $name) : int|null
```
</a>




Get the unique ID of an Domain


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `int|null`


---
### <a name="getRecords">
```php
public getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*') : array
```
</a>




Receives all DNS entries for a specific domain.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string|object** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string|object** | The Domain name or object |



#### Returns: `array`


---
### <a name="getRecord">
```php
public getRecord(string : $domain, string : $type = '*', string : $name) : object|null
```
</a>




Get a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string** | The Record name |



#### Returns: `object|null`


---
### <a name="updateRecord">
```php
public updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60) : void
```
</a>




Update a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |
| `value` | **string** | The new value of the Record |
| `prio` | **string** | The new priority of the Record |
| `ttl` | **string** | The new ttl of the Record |





---
### <a name="createRecord">
```php
public createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60) : mixed
```
</a>




Create a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `name` | **string** | The Record name |
| `type` | **string** | The Record type (`A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `value` | **string** | The new value of the Record |
| `prio` | **string** | The new priority of the Record |
| `ttl` | **string** | The new ttl of the Record |



#### Returns: `mixed`


---
### <a name="deleteRecord">
```php
public deleteRecord(string : $domain, string : $record) : void
```
</a>




Deletes a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |







