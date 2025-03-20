# Record: Get
Get a DNS record.

# Example
A Full Example can be found on [Record.Get.php](Record.Get.php).

```!php
$dns		=  new AlfaDNS('<username>', '<password>');
$record		= $dns->getRecord('example.com', 'TXT', '_acme-challenge.example.com');

print_r($record);
```

# Output
```
stdClass Object (
    [id]		=> 20123456
    [name]		=> _acme-challenge.example.com
    [type]		=> TXT
    [value]		=> Am4jriFJJSfUbCx0Z2ylXEEurQF27mp5FICQJTwZMPQ
    [priority]	=> 0
    [ttl]		=> 60
)
```