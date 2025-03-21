
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
<h6>Usage</h6>
<pre lang="php">$dns = new AlfaDNS(string : $username, string : $password);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>username</pre></td><td><strong>string</strong></td><td><i>The Username</i></td></tr>
<tr><td><pre>password</pre></td><td><strong>string</strong></td><td><i>The Password</i></td></tr>
</table>





</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="call" id="call">call</a>
> [!IMPORTANT]
> This method is **private**.
Internal call HTTP Request


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->call(string : $action, array : $data = null, array : $headers = [], array : $cookies = []);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>action</pre></td><td><strong>string</strong></td><td><i>The Action-URL</i></td></tr>
<tr><td><pre>data</pre></td><td><strong>array</strong></td><td><i>The POST-Data for the Request</i></td></tr>
<tr><td><pre>headers</pre></td><td><strong>array</strong></td><td><i>Additional Headers for the Request</i></td></tr>
<tr><td><pre>cookies</pre></td><td><strong>array</strong></td><td><i>Additional Cookies for the Request</i></td></tr>
</table>



<h6>Returns: `array`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="ajax" id="ajax">ajax</a>
> [!IMPORTANT]
> This method is **private**.



<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->ajax(string : $action, array : $data = null);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>action</pre></td><td><strong>string</strong></td><td><i>The Action-URL</i></td></tr>
<tr><td><pre>data</pre></td><td><strong>array</strong></td><td><i>The POST-Data for the Request</i></td></tr>
</table>



<h6>Returns: `array`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🔴 <a name="form" id="form">form</a>
> [!IMPORTANT]
> This method is **private**.



<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->form(string : $action, array : $data = null, array : $headers = []);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>action</pre></td><td><strong>string</strong></td><td><i>The Action-URL</i></td></tr>
<tr><td><pre>data</pre></td><td><strong>array</strong></td><td><i>The POST-Data for the Request</i></td></tr>
<tr><td><pre>headers</pre></td><td><strong>array</strong></td><td><i>Additional Headers for the Request</i></td></tr>
</table>



<h6>Returns: `array`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟠 <a name="login" id="login">login</a>
> [!IMPORTANT]
> This method is **protected**.



<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->login(string : $username, string : $password);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>username</pre></td><td><strong>string</strong></td><td><i>The Username</i></td></tr>
<tr><td><pre>password</pre></td><td><strong>string</strong></td><td><i>The Password</i></td></tr>
</table>



<h6>Returns: `bool`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomains" id="getdomains">getDomains</a>
Retrieves the domains entered in the name server and their IDs.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->getDomains(int : $limit = 10, int : $page = 1);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>limit</pre></td><td><strong>int</strong></td><td><i>Maximum of domains in the list</i></td></tr>
<tr><td><pre>page</pre></td><td><strong>int</strong></td><td><i>The page of the List</i></td></tr>
</table>



<h6>Returns: `array`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomain" id="getdomain">getDomain</a>
Get the Domain data by the name.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->getDomain(string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>name</pre></td><td><strong>string</strong></td><td><i>The Domain name</i></td></tr>
</table>



<h6>Returns: `object|null`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getdomainid" id="getdomainid">getDomainID</a>
Get the unique ID of an Domain


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->getDomainID(string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>name</pre></td><td><strong>string</strong></td><td><i>The Domain name</i></td></tr>
</table>



<h6>Returns: `int|null`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getrecords" id="getrecords">getRecords</a>
Receives all DNS entries for a specific domain.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->getRecords(string|object : $domain, string : $type = '*', string|object : $name = '*');</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>domain</pre></td><td><strong>string|object</strong></td><td><i></i></td></tr>
<tr><td><pre>type</pre></td><td><strong>string</strong></td><td><i>The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`)</i></td></tr>
<tr><td><pre>name</pre></td><td><strong>string|object</strong></td><td><i>The Domain name or object</i></td></tr>
</table>



<h6>Returns: `array`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="getrecord" id="getrecord">getRecord</a>
Get a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->getRecord(string : $domain, string : $type = '*', string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>domain</pre></td><td><strong>string</strong></td><td><i></i></td></tr>
<tr><td><pre>type</pre></td><td><strong>string</strong></td><td><i>The Record type (`*`, `A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`)</i></td></tr>
<tr><td><pre>name</pre></td><td><strong>string</strong></td><td><i>The Record name</i></td></tr>
</table>



<h6>Returns: `object|null`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="updaterecord" id="updaterecord">updateRecord</a>
Update a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>domain</pre></td><td><strong>string</strong></td><td><i>The Domain name</i></td></tr>
<tr><td><pre>record</pre></td><td><strong>string</strong></td><td><i>The Record object</i></td></tr>
<tr><td><pre>value</pre></td><td><strong>string</strong></td><td><i>The new value of the Record</i></td></tr>
<tr><td><pre>prio</pre></td><td><strong>string</strong></td><td><i>The new priority of the Record</i></td></tr>
<tr><td><pre>ttl</pre></td><td><strong>string</strong></td><td><i>The new ttl of the Record</i></td></tr>
</table>





</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="createrecord" id="createrecord">createRecord</a>
Create a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>domain</pre></td><td><strong>string</strong></td><td><i>The Domain name</i></td></tr>
<tr><td><pre>name</pre></td><td><strong>string</strong></td><td><i>The Record name</i></td></tr>
<tr><td><pre>type</pre></td><td><strong>string</strong></td><td><i>The Record type (`A`, `AAAA`, `CNAME`, `HINFO`, `MX`, `NAPTR`, `NS`, `RP`, `SRV`, `TXT`)</i></td></tr>
<tr><td><pre>value</pre></td><td><strong>string</strong></td><td><i>The new value of the Record</i></td></tr>
<tr><td><pre>prio</pre></td><td><strong>string</strong></td><td><i>The new priority of the Record</i></td></tr>
<tr><td><pre>ttl</pre></td><td><strong>string</strong></td><td><i>The new ttl of the Record</i></td></tr>
</table>



<h6>Returns: `mixed`</h6>


</dd></dl></dd></dl></dd></dl></dd></dl>---
### 🟢 <a name="deleterecord" id="deleterecord">deleteRecord</a>
Deletes a DNS record.


<dl><dd><dl><dd><dl><dd><dl><dd>
<h6>Usage</h6>
<pre lang="php">$dns->deleteRecord(string : $domain, string : $record);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr><td><pre>domain</pre></td><td><strong>string</strong></td><td><i>The Domain name</i></td></tr>
<tr><td><pre>record</pre></td><td><strong>string</strong></td><td><i>The Record object</i></td></tr>
</table>





</dd></dl></dd></dl></dd></dl></dd></dl>

