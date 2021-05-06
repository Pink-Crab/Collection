<?php

declare(strict_types=1);
/**
 * Collection mock using the Indexed & ArrayAccess_Aware trait.
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
use PinkCrab\Collection\Traits\ArrayAccess_Aware;

class Array_Collection extends Collection implements ArrayAccess {
	use Indexed, ArrayAccess_Aware;
}