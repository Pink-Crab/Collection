<?php

declare(strict_types=1);
/**
 * Collection mock using the Indexed & Is_Iterable
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

use Iterator;
use ArrayAccess;
use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Indexed;
use PinkCrab\Collection\Traits\Is_Iterable;

class Iterable_Collection extends Collection implements Iterator {
	use Indexed, Is_Iterable;
}