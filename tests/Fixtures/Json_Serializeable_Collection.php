<?php

declare(strict_types=1);
/**
 * Collection mock using the JsonSerializable trait.
 *
 * @since 0.2.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

use JsonSerializable;
use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Traits\JsonSerialize;

class Json_Serializeable_Collection extends Collection implements JsonSerializable {
	use JsonSerialize;
}
