<?php

declare(strict_types=1);

/**
 * Typed collection mock
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

use PinkCrab\Collection\Collection;
use PinkCrab\Collection\Tests\Fixtures\Type_A;

class Typed_Collection extends Collection {

	/**
	 * Ensure only instances of Sample_Class are populated.
	 *
	 * @param array<int|string, mixed> $data
	 * @return array<int|string, Sample_Class>
	 */
	protected function map_construct( array $data ): array {
		return array_filter(
			$data,
			function( $class ): bool {
				return is_a( $class, Type_A::class, false );
			}
		);
	}
}
