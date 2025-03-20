# Record: Update
Update a DNS record.

# Example
A Full Example can be found on [Record.Update.php](Record.Update.php).

```!php
$dns		=  new AlfaDNS('<username>', '<password>');

$dns->updateRecord('example.com', '_acme-challenge.example.com', 'TXT', 'NEWVALUE' . time(), 0, 60);
```