```!php
$dns =  new AlfaDNS('<username>', '<password>');

$domains = $dns->getDomains($limit = 10, $page = 1);

$recods = $dns->getRecords($domain_id, $type = '*');

$domain = $dns->getDomain($name);

$domain_id = $dns->getDomainID($name);
```