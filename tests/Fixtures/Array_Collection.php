<?php

declare(strict_types=1);
/**
 * Collection mock using the Indexed & Has_ArrayAccess trait.
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

use ArrayAccess;
use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Indexed;
use PinkCrab\Collection\Traits\Has_ArrayAccess;

class Array_Collection extends Collection implements ArrayAccess {
	use Indexed, Has_ArrayAccess;
}