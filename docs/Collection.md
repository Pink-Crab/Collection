---
description: >-
  The base collection offers a range of basic features but assumes you do not
  need access to the key. All data is treated as a simple sequence but can be
  extended with custom methods.
---

# Collection

### Implements 

**Countable**

Collection consists of the following methods.

### Collection::from\(\);

> @param array\|void $data  
> @return New Collection

You can create a collection either by using the constructor or the static constructor.   
An array can be passed to either.

```php
$collection = new Collection(['your','data']);
// OR
$collection = Collection::from(['your','data']);
```

### Collection::apply\(\);

A callback can be applied to every element in the collection. This works like map\(\), but rather than returning a new Collection, apply is just applied to the current data.

> @param callable $function  
>       function\(mixed $value\): mixed {...}  
> @return Existing Collection

```php
$collection = Collection::from([1,2,3,4]);

$collection->apply(fn($e) => $e*2);

var_dump($collection); // 2,4,6,8
```

### Collection::map\(\);

A callback can be applied to all items in a collection, then a new collection is returned with the new values. If the Collection is extended, it will return a new instance of the extended class. 

> @param callable $function  
>       function\(mixed $value\): mixed {...}  
> @return New Collection

```php
$initial_collection = Collection::from([1,2,3,4]);
$new_collection = $initial_collection->map(fn($e) => $e*2);

var_dump($initial_collection); // 1,2,3,4
var_dump($new_collection); // 2,4,6,8
```

### Collection::each\(\)

A callback can be used to perform a foreach loop of the data. The callback takes both $value and $key and a return value is not required/ignored.

> @param callable $function  
>       function\(mixed $value, int\|string $key\): void {...}  
> @return Existing Collection

```php
$collection = Collection::from(['A' => 'Apple', 'B' => 'Banana', 'C' => 'Cat']);
$collection->each(function($value, $key){
    echo "{$key} is for {$value} \n";
});

// Output
A is for Apple 
B is for Banana 
C is for Cat 
```

### Collection::filter\(\)

The collection can be filtered into a new collection. It uses the regular array\_filter under the hood and allows the use of its additional flags.

> @param callable $function  
>       function\(mixed $value\|value \[, int\|string $key\], int $mode = 0\): bool {...}  
> @return New Collection

```php
$initial_collection = Collection::from([1,2,3,4,5,6,7,8]);
$filtered_collection = $initial_collection->filter(function( $e ) {
	return $e % 2 === 0;
});
var_dump($filtered_collection); // 2, 4, 6, 8

// Using both flag.
$with_both = $initial_collection->filter(function( $value, $key ) {
	return $key % 2 === 0;
}, ARRAY_FILTER_USE_BOTH);
var_dump($with_both); // 1, 3, 5, 7

```

### Collection::merge\(\)

Any array or other existing collection can be merged, resulting in a new collection instance.

> @param array\|Collection $data  
> @return New Collection

```php
$first = Collection::from([1,2,3,4]);
$second = Collection::from([5,6,7,8]);

$merged = $first->merge($second);
echo $merged->join(); // 12345678

// With array.
echo $merged->merge([9,10,11,12,13])->join('-');
//1-2-3-4-6-5-7-8-9-10-11-12-13
```

### Collection::reduce\(\)

Applies a filter to reduce the contents of the collection to a single value. Uses array\_reduce under the hood and its callback has the same arguments. \($carry, $value\).

By default, the initial value is an empty string, but this can be set as the send parameter.

> @param callable $function  
>       function\(mixed $carry, mixed $value\): mixed {...}  
> @param mixed $inital  
> @return Existing Collection

```php
$collection = Collection::from([1,2,3,4]);
echo $collection->reduce(function($carry, $value){
		$carry .= ( $value * 2 );
		return $carry;
}, ''); // 2468
```

### Collection::push\(\)

Adds items to the tail/end of the internal array. The item is added without declaring the index. Single or multiple values can be added.

> @param mixed ...$data  
> @return Existing Collection

```php
$collection = new Collection();
$collection->push(1);
$collection->push(2,3,4,5);
echo $collection->join('-'); // 1-2-3-4-5
```

### Collection::unshift\(\)

Adds items to the head/start of the internal collection. The item is added without declaring the index. Single or multiple values can be added.

> @param mixed ...$data  
> @return Existing Collection

```php
$collection = new Collection([1,2,3]);
$collection->unshift(0);
$collection->unshift(-1,-2,-3);
echo $collection->join(','); // -3,-2,-1,0,1,2,3
```

### Collection::pop\(\)

Returns and removes the last item from the collection.

> @return mixed

```php
$collection = new Collection([1,2,3]);
echo $collection->pop(); // 1
echo $collection->join(','); // 2,3
```

### Collection::shift\(\)

Returns and removes the first item from the collection

> @return mixed

```php
$collection = new Collection([1,2,3]);
echo $collection->shift(); // 3
echo $collection->join(','); // 1,2
```

### Collection::to\_array\(\)

Returns the underlying array.

> @return array

```php
$collection = new Collection([1,2,3]);
var_dump(is_array($collection->to_array())); //true
```

### Collection::contains\(\)

Searches for a single value or ALL from a set of values, within the collection. If searching for an object, it will only return the same instance, not the same type. Returns the 

> @param mixed ...$values  
> @return bool

```php
$collection = new Collection([1,2,3]);
$collection->contains(1); // true
$collection->contains(2,3); // true
$collection->contains(2,3,4); // false
```

### Collection::is\_empty\(\)

Checks if the collection is empty or not.

> @return bool

```php
$collection = new Collection();
$collection->is_empty(); // true
$collection->push(1,3);
$collection->is_empty(); // false
```

### Collection::join\(\)

Joins the contents of the collection, assumes all elements can be treated as a string.

> @param string $glue \(defaults to blank string\)  
> @return string

```php
$collection = new Collection([9,10,11,12,13]);
echo $collection->join(); // 910111213
echo $collection->join('-'); // 9-10-11-12-13
```

### Collection::count\(\)

Returns the count of items in the collection.   
This method implements the Countable interface

> @return int

```php
$collection = new Collection([9,10,11,12,13]);
echo $collection->count(); // 5

// As the collection implements countable.
echo count($collection); // 5
```



### Collection::clear\(\)

Clears the internal array and returns the same instance.

> @return Existing Collection

```php
$collection = new Collection([9,10,11,12,13]);
echo $collection->count(); // 5
$collection->clear();
$collection->is_empty();
```

### Collection::copy\(\)

Does a copy of the existing collection, to a new instance \(new static\(\)\)

> @return New Collection

```php
$collection = new Collection([1,2,3]);
$copy_collection = $collection->copy();
var_dump($collection); // 1,2,3
var_dump($copy_collection); // 1,2,3
var_dump($collection === $copy_collection); //false
```

### Collection::sort\(\)

Sorts the internal array using either natsort\(\) or usort\(\). The same instance is returned after sorting, if you wish to create a new instance, see sorted\(\)

@param callable\|null $function   
@return Existing Collection

```php
$collection = Collection::from( array( 'a', 'z', 'f', 'y', 'o' ) );

// By passing no comparator function, natsort() is used.
$collection->sort();
var_dump($collection); // a, f, o, y, z

// A custom comparator can be passed
$collection->sort(
  function( $a, $b ) {
     return $b <=> $a;
	}
);
var_dump($collection); // z,y,o,f,a
```

### Collection::sorted\(\)

Sorts the contents of the collection using sort\(\) above, but returns a new collection instance.

@param callable\|null $function   
@return New Collection

```php
$collection = Collection::from( array( 'a', 'z', 'f', 'y', 'o' ) );
$sorted = $collection->sorted();
var_dump($sorted); // a, f, o, y, z
// inital collection will still be as it was.
var_dump($collection); // a, z, f, y, o
```

### Collection::slice\(\)

Creates a new Collection instance with sub collection. The length can be supplied or not, if not supplied will use the length of the current collection as the $limit value

> @param int $offset  
> @param int\|null $length   
> @return New Collection

```php
$collection = Collection::from( array( 1,2,3,4,5,6,7,8,9,10 ) );
$first_half = $collection->slice(5);
var_dump($first_half); // 1,2,3,4,5

// inital collection will still be as it was.
var_dump($collection); //  1,2,3,4,5,6,7,8,9,10
```

### Collection::diff\(\)

Computes the difference between the existing collection and another \(array or Collection\). As with array\_diff this only compares in 1 direction.

> @param array\|collection $data  
> @param callable\|null $comparator  
> @return New Collection  
> @thorws TypeError if $data is not an array or collection.

```php
$collection = Collection::from( [1,2,3,4,5,6,7,8,9,10] );
$diff_array = [1,2,3,4,5,6,7,8];
$diff_collection = Collection::from( [4,5,6,7,8,9,10] );

var_dump($collection->diff($diff_array)); // 9,10
var_dump($collection->diff($diff_collection)); // 1,2,3
```

If either collection/array contains objects, `array_udiff` will be used. By default this will match objects based on the instance (not values), but an optional callback can be used.

There are 2 helper functions that can be used, these helper functions return the comparison callable, so be called directly.
* ```Comparisons::by_instances()``` matches by instances
* ```Comparisons::by_values()``` matches by values

```php
$collection->diff($some_array, Comparisons::by_values());
$collection->diff($some_array, Comparisons::by_instances());
```


### Collection::intersect\(\)

Computes the matches between the existing collection and another \(array or Collection\). As with array\_intersect this only compares in 1 direction.

> @param array\|collection $data  
> @param callable\|null $comparator  
> @return New Collection  
> @thorws TypeError if $data is not an array or collection.

```php
$collection = Collection::from( [1,2,3,4,5,6,7,8,9,10] );
$as_array = [1,2,3,4,5,11,12,13];
$as_collection = Collection::from( [6,7,8,9,10,20,21,99] );

var_dump($collection->intersect($as_array)); // 1,2,3,4,5
var_dump($collection->intersect($as_collection)); // 6,7,8,9,10
```
If either collection/array contains objects, `array_uintersect` will be used. By default this will match objects based on the instance (not values), but an optional callback can be used.

There are 2 helper functions that can be used, these helper functions return the comparison callable, so be called directly.
* ```Comparisons::by_instances()``` matches by instances
* ```Comparisons::by_values()``` matches by values

```php
$collection->intersect($some_array, Comparisons::by_instances());
$collection->intersect($some_array, Comparisons::by_values());
```

### Collection::group_by\(\)

Groups an existing collection into sub collections (of the same type), which itself in held in a `Collection` that uses the `Indexed` trait.

> @param callable $callable  
> @return New Indexed Collection  

```php
$collection = Collection<T>::from( [1,2,3,4,5,6,7,8,9,10] );
$grouped = $collection->group_by(fn($e) => $e % 2 === 0 ? 'EVEN' : 'ODD');

var_dump($grouped->as_array()); //['EVEN' => Collection<T>[2,4,6,8,10], 'ODD' => Collection<T>[1,3,5,7,9]]

// All Indexed functionlity is applied.
var_dump($grouped->has('EVEN')); //true
var_dump($grouped->has('ODD')); //true

var_dump($grouped->get('EVEN')->to_array()); // [2,4,6,8,10]
var_dump($grouped->has('ODD')); //Collection<T>[1,3,5,7,9]
```

