<?php

declare(strict_types=1);
/**
 * Trait usage stub for PHPStan.
 *
 * This class exists solely to give PHPStan a using-class context for the
 * trait files in src/Traits/. Without a class applying each trait, PHPStan
 * reports `trait.unused` and skips analysis of the trait body entirely,
 * which masks real type errors inside the trait.
 *
 * Not autoloaded at runtime (no composer autoload entry) — analysis only.
 *
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Stubs;

use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Has_ArrayAccess;
use PinkCrab\Collection\Traits\Is_Iterable;
use PinkCrab\Collection\Traits\Is_JsonSerializable;
use PinkCrab\Collection\Traits\Sequence;

/**
 * @implements \ArrayAccess<int|string, mixed>
 * @implements \Iterator<int|string, mixed>
 */
class Stub_All_Traits extends Collection implements \ArrayAccess, \Iterator, \JsonSerializable {
	use Has_ArrayAccess;
	use Is_Iterable;
	use Is_JsonSerializable;
	use Sequence;
}
