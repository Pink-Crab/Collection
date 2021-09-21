# PinkCrab Collection #

![alt text](https://img.shields.io/badge/Current_Version-0.2.0-yellow.svg?style=flat " ") 
[![Open Source Love](https://badges.frapsoft.com/os/mit/mit.svg?v=102)]()
![](https://github.com/Pink-Crab/Collection/workflows/GitHub_CI/badge.svg " ")
[![codecov](https://codecov.io/gh/Pink-Crab/collection/branch/master/graph/badge.svg?token=6tUeia2v2S)](https://codecov.io/gh/Pink-Crab/collection)

## Version 0.2.0 ##

> This library was extracted from the PinkCrab Plugin Framework (Perique)

## Why? ##

Give access to a basic collection with all expected functionlaity, filtering, mapping, folding, sorting and comparing. But is also extendable for creating custom collections, which can be expanded and typed. A fairly simple, but extendable Collection. 

## Install ##

> `composer install pink-crab/collection`

## Basic Useage ##

> See [`./docs`](./docs) for more details and examples.

```php
$collection = new Collection(['1',2,'3']);
$collection->push(4);
$collection->apply(fn($e) => (string) $e);
var_dump($collection); // ['1','2','3','4'];
```
****
```php
$collection = new Collection([1,2,3,4,5,6,7,8,9,10]);
$collection->filter(fn($e) => $e % 2 == 0);
var_dump($collection); // [2,4,6,8,10];
```

## Extendable Traits

The Collection package comes with a few Traits which can be used when creating custom collections. These can either be created on the fly using anonymous classes or through defining them as full classes.

```php
$indexed_collection = new class() extends \PinkCrab\Collection\Collection {
	use \PinkCrab\Collection\Traits\Indexed;
};

$indexed_collection->set( 'key1', 'value1' );
$indexed_collection->has( 'key1' ); //true
var_dump( $indexed_collection );


// As a full class.
class Indexed_Collection extends \PinkCrab\Collection\Collection {
	use \PinkCrab\Collection\Traits\Indexed;
};

$indexed_collection = new Indexed_Collection();
$indexed_collection->set( 'key1', 'value1' );
$indexed_collection->has( 'key1' ); //true
var_dump( $indexed_collection );

```

## Typed & Mapped Collections

```php 
<?php

class Post_Collection extends Collection {
	// Filter out anything not matching.
	protected function map_construct( array $data ): array {
		return array_filter(fn($e): bool => is_a($data, \WP_Post::class));
	}
}

$posts = Post_Collection::from([$post1, null, $post2, false, WP_Error]);
var_dump($posts->to_array()); // [$post1, $post2];

$collection->each(function($e){
	print $e->post_title . PHP_EOL;
}); 
// Post Title 1
// Post Title 2
```


## License ##

#### MIT License http://www.opensource.org/licenses/mit-license.html  

## Change Log ##
* 0.2.0 - Added in option callbacks for diff and intersect, complete with helper functions for checking based on object instance or values/type. Also includes the group_by() method.
* 0.1.0 - Added Has_ArrayAccess and Is_Iterable traits to allow the implementation of the interfaces. Added docs from existing GitBook repo.
* 0.0.0 - Extracted from the PinkCrab Plugin Framework as a standalone package.
