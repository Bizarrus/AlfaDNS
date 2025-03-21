
# `\AlfaDNS\AlfaDNS`

Helper class for the Alfahosting DNS to automatically read/write nameserver entries for domains.

This project is used, for example, with the Library [GitHub: skoerfgen/ACMECert](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.
This project was created because Alfahosting does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.




## Methods
> [`__construct(string : $username, string : $password) : void`](#method___construct_preview)
> 
> [`getDomains(int : $limit = 10, int : $page = 1) : array`](#method_getDomains_preview)
> 
> [`getDomain(string : $name) : object|null`](#method_getDomain_preview)
> 
> [`getDomainID(string : $name) : int|null`](#method_getDomainID_preview)
> 
> [`getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*') : array`](#method_getRecords_preview)
> 
> [`getRecord(string : $domain, string : $type = '*', string : $name) : object|null`](#method_getRecord_preview)
> 
> [`updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60) : void`](#method_updateRecord_preview)
> 
> [`createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60) : mixed`](#method_createRecord_preview)
> 
> [`deleteRecord(string : $domain, string : $record) : void`](#method_deleteRecord_preview)
> 

---
### <a name="method___construct_preview" id="method___construct_preview">:heavy_minus_sign:</a>
```php
public __construct(string : $username, string : $password) : void
```




The Constructor of the Class.
Authentication takes place via the Alfahosting DNS server account.

#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |





---
### <a name="method_getDomains_preview" id="method_getDomains_preview">:heavy_minus_sign:</a>
```php
public getDomains(int : $limit = 10, int : $page = 1) : array
```




Retrieves the domains entered in the name server and their IDs.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | Maximum of domains in the list |
| `page` | **int** | The page of the List |



#### Returns: `array`


---
### <a name="method_getDomain_preview" id="method_getDomain_preview">:heavy_minus_sign:</a>
```php
public getDomain(string : $name) : object|null
```




Get the Domain data by the name.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `object|null`


---
### <a name="method_getDomainID_preview" id="method_getDomainID_preview">:heavy_minus_sign:</a>
```php
public getDomainID(string : $name) : int|null
```




Get the unique ID of an Domain


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `int|null`


---
### <a name="method_getRecords_preview" id="method_getRecords_preview">:heavy_minus_sign:</a>
```php
public getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*') : array
```




Receives all DNS entries for a specific domain.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string|object** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string|object** | The Domain name or object |



#### Returns: `array`


---
### <a name="method_getRecord_preview" id="method_getRecord_preview">:heavy_minus_sign:</a>
```php
public getRecord(string : $domain, string : $type = '*', string : $name) : object|null
```




Get a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string** | The Record name |



#### Returns: `object|null`


---
### <a name="method_updateRecord_preview" id="method_updateRecord_preview">:heavy_minus_sign:</a>
```php
public updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60) : void
```




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
### <a name="method_createRecord_preview" id="method_createRecord_preview">:heavy_minus_sign:</a>
```php
public createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60) : mixed
```




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
### <a name="method_deleteRecord_preview" id="method_deleteRecord_preview">:heavy_minus_sign:</a>
```php
public deleteRecord(string : $domain, string : $record) : void
```




Deletes a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |







