# Record: Create
Create a DNS record.

# Example
A Full Example can be found on [Record.Create.php](Record.Create.php).

```php
$dns		= new AlfaDNS('<username>', '<password>');

$dns->createRecord('example.com', '_acme-challenge.example.com', 'TXT', 'NEWVALUE' . time(), 0, 60);
```
