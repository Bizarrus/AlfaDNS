
# :copyright: `\AlfaDNS\AlfaDNS`

Helper class for the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS to automatically read/write nameserver entries for domains.
This project is used, for example, with the Library [:octocat:`skoerfgen/ACMECert`](https://github.com/skoerfgen/ACMECert) to automatically renew `Let's Encrypt` wildcard certificates.
This project was created because ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` does not offer an interface for the DNS server for normal customers and the [SOAP interface](https://dns.alfahosting.de/api/) is **only** available from the [Name 500](https://alfahosting.de/eigene-nameserver/) package plan. This library automatically connects to the normal user interface via HTTP request and can be used for automated handling of DNS settings.

# Support me!
Donations are an important contribution to the development of OpenSource projects. With your donation you can help me to advance all projects. Your support enables me to support my programming time.

Be a team-player, all feedbacks of my donations will have the priority. I will build this for **YOU**!

[![PAYPAL]](https://paypal.me/debitdirect)

[PAYPAL]: https://img.shields.io/badge/PayPal-%24?style=for-the-badge&logo=paypal&color=%23169BD7




## Methods
> 🟢 [`$dns = new AlfaDNS($username, $password);`](#__construct)
> 
> 🔴 [`$array = $dns->call($action, $data = null, $headers = [], $cookies = []);`](#call)
> 
> 🔴 [`$data = $dns->ajax($action, $data = null);`](#ajax)
> 
> 🔴 [`$array = $dns->form($action, $data = null, $headers = []);`](#form)
> 
> 🟠 [`$bool = $dns->login($username, $password);`](#login)
> 
> 🟢 [`$array = $dns->getDomains($limit = 10, $page = 1);`](#getdomains)
> 
> 🟢 [`$data = $dns->getDomain($name);`](#getdomain)
> 
> 🟢 [`$data = $dns->getDomainID($name);`](#getdomainid)
> 
> 🟢 [`$array = $dns->getRecords($domain, $type = '*', $name = '*');`](#getrecords)
> 
> 🟢 [`$data = $dns->getRecord($domain, $type = '*', $name);`](#getrecord)
> 
> 🟢 [`$dns->updateRecord($domain, $record, $value, $prio, $ttl = 60);`](#updaterecord)
> 
> 🟢 [`$mixed = $dns->createRecord($domain, $name, $type, $value, $prio, $ttl = 60);`](#createrecord)
> 
> 🟢 [`$dns->deleteRecord($domain, $record);`](#deleterecord)
> 

<hr />
<h4>🟢 <a name="__construct" id="__construct">Constructor</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

The Constructor of the Class.
Authentication takes place via the ![](https://raw.githubusercontent.com/Bizarrus/AlfaDNS/refs/heads/main/Docs/alfahosting.png) `Alfahosting` DNS server account (See Screenshot: [Examples/Auth.Data.png](https://github.com/Bizarrus/AlfaDNS/raw/main/Examples/Auth.Data.png?raw=true)).

<h6>Usage</h6>
<pre lang="php">$dns = new AlfaDNS(string : $username, string : $password);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>username</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Username</i></td>
</tr>
<tr>
	<td><kbd>password</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Password</i></td>
</tr>
</table>



<h6>Returns: <kbd>mixed</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🔴 <a name="call" id="call">call</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

> [!IMPORTANT]
> 
> This method is **private**.
Internal call HTTP Request


<h6>Usage</h6>
<pre lang="php">$array = $dns->call(string : $action, array : $data = null, array : $headers = [], array : $cookies = []);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>action</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Action-URL</i></td>
</tr>
<tr>
	<td><kbd>data</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>The POST-Data for the Request</i></td>
</tr>
<tr>
	<td><kbd>headers</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>Additional Headers for the Request</i></td>
</tr>
<tr>
	<td><kbd>cookies</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>Additional Cookies for the Request</i></td>
</tr>
</table>



<h6>Returns: <kbd>array</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🔴 <a name="ajax" id="ajax">ajax</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

> [!IMPORTANT]
> 
> This method is **private**.



<h6>Usage</h6>
<pre lang="php">$data = $dns->ajax(string : $action, array : $data = null);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>action</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Action-URL</i></td>
</tr>
<tr>
	<td><kbd>data</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>The POST-Data for the Request</i></td>
</tr>
</table>



<h6>Returns: <kbd>object</kbd>, <kbd>null</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🔴 <a name="form" id="form">form</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

> [!IMPORTANT]
> 
> This method is **private**.



<h6>Usage</h6>
<pre lang="php">$array = $dns->form(string : $action, array : $data = null, array : $headers = []);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>action</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Action-URL</i></td>
</tr>
<tr>
	<td><kbd>data</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>The POST-Data for the Request</i></td>
</tr>
<tr>
	<td><kbd>headers</kbd></td>
	<td><kbd>array</kbd></td>
	<td><i>Additional Headers for the Request</i></td>
</tr>
</table>



<h6>Returns: <kbd>array</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟠 <a name="login" id="login">login</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

> [!IMPORTANT]
> 
> This method is **protected**.



<h6>Usage</h6>
<pre lang="php">$bool = $dns->login(string : $username, string : $password);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>username</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Username</i></td>
</tr>
<tr>
	<td><kbd>password</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Password</i></td>
</tr>
</table>



<h6>Returns: <kbd>bool</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="getdomains" id="getdomains">getDomains</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Retrieves the domains entered in the name server and their IDs.


<h6>Usage</h6>
<pre lang="php">$array = $dns->getDomains(int : $limit = 10, int : $page = 1);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>limit</kbd></td>
	<td><kbd>int</kbd></td>
	<td><i>Maximum of domains in the list</i></td>
</tr>
<tr>
	<td><kbd>page</kbd></td>
	<td><kbd>int</kbd></td>
	<td><i>The page of the List</i></td>
</tr>
</table>



<h6>Returns: <kbd>array</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="getdomain" id="getdomain">getDomain</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Get the Domain data by the name.


<h6>Usage</h6>
<pre lang="php">$data = $dns->getDomain(string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>name</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
</table>



<h6>Returns: <kbd>object</kbd>, <kbd>null</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="getdomainid" id="getdomainid">getDomainID</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Get the unique ID of an Domain


<h6>Usage</h6>
<pre lang="php">$data = $dns->getDomainID(string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>name</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
</table>



<h6>Returns: <kbd>int</kbd>, <kbd>null</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="getrecords" id="getrecords">getRecords</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Receives all DNS entries for a specific domain.


<h6>Usage</h6>
<pre lang="php">$array = $dns->getRecords(string | object : $domain, string : $type = '*', string : $name = '*');</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>domain</kbd></td>
	<td><kbd>string</kbd>, <kbd>object</kbd></td>
	<td><i>The Domain name or object</i></td>
</tr>
<tr>
	<td><kbd>type</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record type (<kbd>*</kbd>, <kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)</i></td>
</tr>
<tr>
	<td><kbd>name</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The name of the record</i></td>
</tr>
</table>



<h6>Returns: <kbd>array</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="getrecord" id="getrecord">getRecord</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Get a DNS record.


<h6>Usage</h6>
<pre lang="php">$data = $dns->getRecord(string | object : $domain, string : $type = '*', string : $name);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>domain</kbd></td>
	<td><kbd>string</kbd>, <kbd>object</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
<tr>
	<td><kbd>type</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record type (<kbd>*</kbd>, <kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)</i></td>
</tr>
<tr>
	<td><kbd>name</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record name</i></td>
</tr>
</table>



<h6>Returns: <kbd>object</kbd>, <kbd>null</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="updaterecord" id="updaterecord">updateRecord</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Update a DNS record.


<h6>Usage</h6>
<pre lang="php">$dns->updateRecord(string : $domain, string : $record, string : $value, string : $prio, string : $ttl = 60);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>domain</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
<tr>
	<td><kbd>record</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record object</i></td>
</tr>
<tr>
	<td><kbd>value</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new value of the Record</i></td>
</tr>
<tr>
	<td><kbd>prio</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new priority of the Record</i></td>
</tr>
<tr>
	<td><kbd>ttl</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new ttl of the Record</i></td>
</tr>
</table>




</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="createrecord" id="createrecord">createRecord</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Create a DNS record.


<h6>Usage</h6>
<pre lang="php">$mixed = $dns->createRecord(string : $domain, string : $name, string : $type, string : $value, string : $prio, string : $ttl = 60);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>domain</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
<tr>
	<td><kbd>name</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record name</i></td>
</tr>
<tr>
	<td><kbd>type</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record type (<kbd>A</kbd>, <kbd>AAAA</kbd>, <kbd>CNAME</kbd>, <kbd>HINFO</kbd>, <kbd>MX</kbd>, <kbd>NAPTR</kbd>, <kbd>NS</kbd>, <kbd>RP</kbd>, <kbd>SRV</kbd>, <kbd>TXT</kbd>)</i></td>
</tr>
<tr>
	<td><kbd>value</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new value of the Record</i></td>
</tr>
<tr>
	<td><kbd>prio</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new priority of the Record</i></td>
</tr>
<tr>
	<td><kbd>ttl</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The new ttl of the Record</i></td>
</tr>
</table>



<h6>Returns: <kbd>mixed</kbd></h6>

</dd></dl></dd></dl></dd></dl></dd></dl><hr />
<h4>🟢 <a name="deleterecord" id="deleterecord">deleteRecord</a></h4>
<dl><dd><dl><dd><dl><dd><dl><dd>

Deletes a DNS record.


<h6>Usage</h6>
<pre lang="php">$dns->deleteRecord(string : $domain, string : $record);</pre>


<h6>Parameters</h6>
<table>
<tr><th>Parameter</th><th>Type</th><th>Description</th></tr>
<tr>
	<td><kbd>domain</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Domain name</i></td>
</tr>
<tr>
	<td><kbd>record</kbd></td>
	<td><kbd>string</kbd></td>
	<td><i>The Record object</i></td>
</tr>
</table>




</dd></dl></dd></dl></dd></dl></dd></dl>

