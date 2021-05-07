---
description: >-
  By adding this trait to Collection, you will be able to use the collection with ArrayAccess.
---

# Has_ArrayAccess

### Custom Collections

To access the collection using standard php array syntax, the Has_ArrayAccess trait can be used to implement the ArrayAccess interface.

```php
use ArrayAccess;
use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Has_ArrayAccess;

class Array_Collection extends Collection implements ArrayAccess {
	use Has_ArrayAccess;
}
```

We can now use the collection as an array, with access to many of php native array functions.

```php
$collection = new Array_Collection();

// Set
$collection[] = 'Start';
$collection[1] = 'Middle';
$collection[] = 'End';
var_dump($collection); // ['start', 'middle', 'end']

// Get 
var_dump($collection[0]); // start

// Unset a key.
unset($colleciton[1]);
var_dump($collection); // ['start','end']

// Isset
var_dump(isset($collection[0])); // True

```
### Methods

The following methods are required to satisify the ArrayAccess interface.

### offsetSet\( $offset, $value )
> @param string|int $offset  
> @param mixed $value  
> @return void  

Sets the value passed to either the offset defined or pushed to the end if no offset defined. 

### offsetExists\( $offset )
> @param string|int $offset  
> @return bool   

Used for isset() and checks if the defined offset exists.

### offsetUnset\( $offset )
> @param string|int $offset  
> @return void  

Used to unset() an offset.

### offsetGet\( $offset )
> @param string|int $offset  
> @return mixed|null  

Used to get a value based on the index.