# My PHP helper class
### Examples
Convert MySQL datetime to Russian datetime, for example `2017-05-29 05:48:20` converts to `29.05.2017 05:48:20`
```php
Helper::datetimeFromMysqlToRussian('2017-05-29 05:48:20');
```
Convert `"six digit date"` to like MySQL date format, for example `240316` converts to `2016-03-24`
```php
Helper::dateFromSixDigitsToMysql('240316');
```
Convert date like `08/16/2017` to like MySQL date format, for example `08/16/2017` converts to `2017-08-16`
```php
Helper::dateFromUsaSlashesToMysql('08/16/2017');
```