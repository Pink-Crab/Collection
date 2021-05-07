<?php

declare(strict_types=1);
/**
 * Collection mock using the Indexed trait.
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\Indexed;

class Indexed_Collection extends Collection {
	use Indexed;
}
