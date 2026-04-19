# PinkCrab Collection #

[![Latest Stable Version](https://poser.pugx.org/pinkcrab/collection/v)](https://packagist.org/packages/pinkcrab/collection)
[![Total Downloads](https://poser.pugx.org/pinkcrab/collection/downloads)](https://packagist.org/packages/pinkcrab/collection)
[![License](https://poser.pugx.org/pinkcrab/collection/license)](https://packagist.org/packages/pinkcrab/collection)
[![PHP Version Require](https://poser.pugx.org/pinkcrab/collection/require/php)](https://packagist.org/packages/pinkcrab/collection)
![GitHub contributors](https://img.shields.io/github/contributors/Pink-Crab/Collection?label=Contributors)
![GitHub issues](https://img.shields.io/github/issues-raw/Pink-Crab/Collection)

[![Tests [PHP7.1-8.5]](https://github.com/Pink-Crab/Collection/actions/workflows/php.yaml/badge.svg)](https://github.com/Pink-Crab/Collection/actions/workflows/php.yaml)

[![codecov](https://codecov.io/gh/Pink-Crab/collection/branch/master/graph/badge.svg?token=6tUeia2v2S)](https://codecov.io/gh/Pink-Crab/collection)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Pink-Crab/Collection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Pink-Crab/Collection/?branch=master)

## Version 1.0.0 ##

> This library was extracted from the PinkCrab Plugin Framework (Perique)

## Why? ##

Give access to a basic collection with all expected functionlaity, filtering, mapping, folding, sorting and comparing. But is also extendable for creating custom collections, which can be expanded and typed. A fairly simple, but extendable Collection. 

## Install ##

Install via Composer:

```bash
composer require pinkcrab/collection
```

Then include the Composer autoloader in your project:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

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
* 1.0.0 - Raised supported PHP range to 7.1–8.5 and modernised the tooling chain (PHPStan 2.x + phpstan stubs so traits are actually analysed, PHPUnit up to 9.6, WPCS-based phpcs). Interface implementations (`ArrayAccess`, `Iterator`, `JsonSerializable`) marked with `#[\ReturnTypeWillChange]` for PHP 8.1+ without dropping PHP 7.x support. `Sequence::sum()` now filters non-numeric values to stay compatible with PHP 8.3's stricter `array_sum()`. Corrected phpdoc types on `Has_ArrayAccess::offsetSet` (nullable offset) and `Is_Iterable::key` (nullable return). **BC break:** public method parameters renamed `$function`/`$callable` → `$callback` on `apply()`, `each()`, `filter()`, `map()`, `reduce()`, `sort()`, `sorted()`, `group_by()` — positional callers unaffected, named-argument callers need to update.
* 0.2.0 - Added in option callbacks for diff and intersect, complete with helper functions for checking based on object instance or values/type. Also includes the group_by() method.
* 0.1.0 - Added Has_ArrayAccess and Is_Iterable traits to allow the implementation of the interfaces. Added docs from existing GitBook repo.
* 0.0.0 - Extracted from the PinkCrab Plugin Framework as a standalone package.
