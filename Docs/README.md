
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
The Constructor of the Class.
Authentication takes place via the Alfahosting DNS server account.

<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns = new AlfaDNS(string : $username, string : $password);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |





</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="call" id="call">call</a>
> [!IMPORTANT]
> This method is **private**.
Internal call HTTP Request


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->call(string : $action, array : $data = null, array : $headers = [], array : $cookies = []);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |
| `cookies` | **array** | Additional Cookies for the Request |



#### Returns: `array`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="ajax" id="ajax">ajax</a>
> [!IMPORTANT]
> This method is **private**.



<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->ajax(string : $action, array : $data = null);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |



#### Returns: `array`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="form" id="form">form</a>
> [!IMPORTANT]
> This method is **private**.



<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->form(string : $action, array : $data = null, array : $headers = []);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `action` | **string** | The Action-URL |
| `data` | **array** | The POST-Data for the Request |
| `headers` | **array** | Additional Headers for the Request |



#### Returns: `array`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟠 <a name="login" id="login">login</a>
> [!IMPORTANT]
> This method is **protected**.



<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->login(string : $username, string : $password);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `username` | **string** | The Username |
| `password` | **string** | The Password |



#### Returns: `bool`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomains" id="getdomains">getDomains</a>
Retrieves the domains entered in the name server and their IDs.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->getDomains(int : $limit = 10, int : $page = 1);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `limit` | **int** | Maximum of domains in the list |
| `page` | **int** | The page of the List |



#### Returns: `array`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomain" id="getdomain">getDomain</a>
Get the Domain data by the name.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->getDomain(string : $name);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `object|null`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomainid" id="getdomainid">getDomainID</a>
Get the unique ID of an Domain


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->getDomainID(string : $name);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | The Domain name |



#### Returns: `int|null`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getrecords" id="getrecords">getRecords</a>
Receives all DNS entries for a specific domain.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*');</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string|object** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string|object** | The Domain name or object |



#### Returns: `array`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getrecord" id="getrecord">getRecord</a>
Get a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->getRecord(string : $domain, string : $type = '*', string : $name);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** |  |
| `type` | **string** | The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`) |
| `name` | **string** | The Record name |



#### Returns: `object|null`


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="updaterecord" id="updaterecord">updateRecord</a>
Update a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |
| `value` | **string** | The new value of the Record |
| `prio` | **string** | The new priority of the Record |
| `ttl` | **string** | The new ttl of the Record |





</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="createrecord" id="createrecord">createRecord</a>
Create a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60);</pre>


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


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="deleterecord" id="deleterecord">deleteRecord</a>
Deletes a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
#### Usage
<pre lang="php">$dns->deleteRecord(string : $domain, string : $record);</pre>


#### Parameters

| Parameter | Type | Description |
|-----------|------|-------------|
| `domain` | **string** | The Domain name |
| `record` | **string** | The Record object |





</dd></dl></dd></dl></dd></dl></dd></dl>

