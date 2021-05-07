---
description: >-
  The base Collection can be extended with the traits included, but also to enforce types.
---

# Typed Collection

It is possible to define a basic filter on a custom Collection which can be used to control the data passed to the collection. This allows for the creation of flexible and reliable custom collections.

```php

class WP_Post_Collection extends Collection {

  use Indexed;

  /**
   * Filters out all none WP_Post instances.
   * @param array<int|string, mixed> $data
   * @return array<int|string, mixed>
   */
  protected function map_construct( array $data ): array {
    return array_filter($data, function($e): bool{
      return is_a($e, WP_Post::class);
    });
  }

}

$post_collection = new WP_Post_Collection([get_post(12), 'not a post']);
var_dump($post_collection->count()); // 1
var_dump($post_collection->to_array()); // [{post_id: 12, ...}]
```

This will also work when pushing and unshifting items to the collection.

```php
class String_Collection extends Collection {

  /**
   * Only allow valid strings.
   * @param array<int|string, mixed> $data
   * @return array<int|string, mixed>
   */
  protected function map_construct( array $data ): array {
    return array_filter($data, function($e): bool{
      return is_string($e);
    });
  }
}

$collection = new String_Collection(['one']);
$collection->push('two');
$collection->push(3);
$collection->push(4.0);
$collection->unshift('zero');

var_dump($post_collection->to_array()); // ['zero', 'one','two']
```
****

## As a Transformer

You can also use the map_construct method, as a transformer. With or without a matching filer.

```php
class Sanitized_Collection extends Collection {

  /** Sanitize all values as they come in. */
  protected function map_construct( array $data ): array {
    return array_map(function($e): string{
      return sanitize_text_field($e);
    }, $data);
  }
}

// Using with filter.

class Sanitized_String_Collection extends Collection {
  
  protected function map_construct( array $data ): array {
    $data = array_filter($data, function($e): bool{
      return is_string($e);
    });
    
    return array_map(function($e): string{
      return sanitize_text_field($e);
    }, $data);
  }
}

```


