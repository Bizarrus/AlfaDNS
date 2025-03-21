
# :copyright: `\AlfaDNS\AlfaDNS`

Helper class for the Alfahosting DNS to automatically read/write nameserver entries for domains.

This project is used, for example, with the Library [GitHub: skoerfgen/ACMECert](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.
This project was created because Alfahosting does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.




## Methods
> 🟢 [`new AlfaDNS(string : $username, string : $password)
`](#__construct)
> 
> 🔴 [`call(string : $action, array : $data = null, array : $headers = [], array : $cookies = [])
 : array`](#call)
> 
> 🔴 [`ajax(string : $action, array : $data = null)
 : array`](#ajax)
> 
> 🔴 [`form(string : $action, array : $data = null, array : $headers = [])
 : array`](#form)
> 
> 🟠 [`login(string : $username, string : $password)
 : bool`](#login)
> 
> 🟢 [`getDomains(int : $limit = 10, int : $page = 1)
 : array`](#getdomains)
> 
> 🟢 [`getDomain(string : $name)
 : object|null`](#getdomain)
> 
> 🟢 [`getDomainID(string : $name)
 : int|null`](#getdomainid)
> 
> 🟢 [`getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*')
 : array`](#getrecords)
> 
> 🟢 [`getRecord(string : $domain, string : $type = '*', string : $name)
 : object|null`](#getrecord)
> 
> 🟢 [`updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60)
 : void`](#updaterecord)
> 
> 🟢 [`createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60)
 : mixed`](#createrecord)
> 
> 🟢 [`deleteRecord(string : $domain, string : $record)
 : void`](#deleterecord)
> 

---
### 🟢 <a name="__construct" id="__construct">Constructor</a>
```php
$dns = new AlfaDNS(string : $username, string : $password) : void
```




The Constructor of the Class.
Authentication takes place via the Alfahosting DNS server account.

#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |





---
### 🔴 <a name="call" id="call">$dns->call</a>
```php
private call(string : $action, array : $data = null, array : $headers = [], array : $cookies = []) : array
```




Internal call HTTP Request


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |
| `cookies` | **array** | Additional Cookies for the Request |



#### Returns: `array`


---
### 🔴 <a name="ajax" id="ajax">$dns->ajax</a>
```php
private ajax(string : $action, array : $data = null) : array
```







#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |



#### Returns: `array`


---
### 🔴 <a name="form" id="form">$dns->form</a>
```php
private form(string : $action, array : $data = null, array : $headers = []) : array
```







#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |



#### Returns: `array`


---
### 🟠 <a name="login" id="login">$dns->login</a>
```php
protected login(string : $username, string : $password) : bool
```







#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |



#### Returns: `bool`


---
### 🟢 <a name="getdomains" id="getdomains">$dns->getDomains</a>
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
### 🟢 <a name="getdomain" id="getdomain">$dns->getDomain</a>
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
### 🟢 <a name="getdomainid" id="getdomainid">$dns->getDomainID</a>
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
### 🟢 <a name="getrecords" id="getrecords">$dns->getRecords</a>
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
### 🟢 <a name="getrecord" id="getrecord">$dns->getRecord</a>
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
### 🟢 <a name="updaterecord" id="updaterecord">$dns->updateRecord</a>
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
### 🟢 <a name="createrecord" id="createrecord">$dns->createRecord</a>
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
### 🟢 <a name="deleterecord" id="deleterecord">$dns->deleteRecord</a>
```php
public deleteRecord(string : $domain, string : $record) : void
```




Deletes a DNS record.


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |







