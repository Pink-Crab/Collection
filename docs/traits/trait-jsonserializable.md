---
description: >-
  By adding this trait to any collection it will ensure that it can be run
  through json_encode().
---

# Is_JsonSerializable

### Custom Collection

To create a collection that implements the JsonSerializable interface, just use the `Is_JsonSerializable` trait and use the `implements JsonSerializable` in the class definition.

```php
use JsonSerializable;
use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Is_JsonSerializable;

class Json_Serializeable_Collection extends Collection implements JsonSerializable {
	use Is_JsonSerializable;
}
```

The trait only has a single method Is_JsonSerializable\(\) and this shouldnt really be called manually, although all it does is returns the data as an array to be JSON encoded.

```php
$collection = new Json_Serializeable_Collection([1,2,3,4,5]);
json_encode($collection); // "[1,2,3,4,5]"
```

