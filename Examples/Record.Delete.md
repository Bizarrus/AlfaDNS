# Record: Delete
Deletes a DNS record.

# Example
A Full Example can be found on [Record.Delete.php](Record.Delete.php).

```!php
$dns		= new AlfaDNS('<username>', '<password>');
$record		= $dns->getRecord('example.com', 'TXT', '_acme-challenge.example.com');

$dns->deleteRecord('example.com', $record);
```