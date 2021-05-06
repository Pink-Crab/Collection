# PinkCrab Collection #

Welcome to the core package of the PinkCrab **Perique** plugin framework, formally known as just the PinkCrab Plugin Framwework. 

![alt text](https://img.shields.io/badge/Current_Version-0.1.0-yellow.svg?style=flat " ") 
[![Open Source Love](https://badges.frapsoft.com/os/mit/mit.svg?v=102)]()
![](https://github.com/Pink-Crab/Framework__core/workflows/GitHub_CI/badge.svg " ")
[![codecov](https://codecov.io/gh/Pink-Crab/Framework__core/branch/master/graph/badge.svg?token=VW566UL1J6)](https://codecov.io/gh/Pink-Crab/Framework__core)


For more details please visit our docs.
https://app.gitbook.com/@glynn-quelch/s/pinkcrab/


## Version 0.1.0 ##


## Why? ##

Perqiue gives you access to an extendable Collection which can be used in place of arrays throughout your application. Can even be configured to only accept a specific type, making simple generic collections a possibility.

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

### MIT License ###
http://www.opensource.org/licenses/mit-license.html  

## Change Log ##
* 0.1.0 - 
* 0.0.0 - Extracted from the PinkCrab Plugin Framework as a standalone package.
