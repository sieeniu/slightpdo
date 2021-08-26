## Connection
```php
use SlightPDO\Configuration;
use SlightPDO\Connection;
use SlightPDO\Factory;

require_once __DIR__ . '/vendor/autoload.php';

$connection = Factory::create(
  new Connection(
    new Configuration("host", 3306, "databaseName", "username", "password")
  )
);

```
