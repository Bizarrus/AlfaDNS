# Record: Update
Update a DNS record.

# Example
A Full Example can be found on [Record.Update.php](Record.Update.php).

```php
$dns		= new AlfaDNS('<username>', '<password>');
$records	= $dns->getRecords('example.com', 'TXT');

foreach($records AS $record) {
	$dns->updateRecord('example.com', $record, 'NEWVALUE-' . time(), 0, 60);
}
```
