<?php

declare(strict_types=1);
/**
 * Tests for a typed collection
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Core\Tests\Collection;

use PHPUnit\Framework\TestCase;
use PinkCrab\Collection\Tests\Fixtures\Type_A;
use PinkCrab\Collection\Tests\Fixtures\Type_B;
use PinkCrab\Collection\Tests\Fixtures\Typed_Collection;

class Test_Typed_Collection extends TestCase {

	/** @testdox It should only be possible to pass valid class to a typed collection. */
	public function test_only_populated_with_simple_classes(): void {
		$collection = new Typed_Collection(
			array(
				$this->createMock( Type_A::class ),
				$this->createMock( Type_A::class ),
				$this->createMock( Type_B::class ),
			)
		);

		// Should only have 2 classes
		$this->assertCount( 2, $collection );

		// Check all Sample_Class types.
		foreach ( $collection->to_array() as $class ) {
			$this->assertInstanceOf( Type_A::class, $class );
		}
	}

	/** @testdox It should not be possible to push none typed data to a typed collection. */
    public function test_can_only_push_valid_types_to_typed_collection(): void {
		$collection = new Typed_Collection();

		$collection->push( $this->createMock( Type_A::class ) );
		$collection->push( $this->createMock( Type_B::class ) );

		// Should only have 2 classes
		$this->assertCount( 1, $collection );

		// Check all Sample_Class types.
		foreach ( $collection->to_array() as $class ) {
			$this->assertInstanceOf( Type_A::class, $class );
		}
	}

    /** @testdox It should not be possible to unshift none typed data to a typed collection. */
    public function test_can_only_unshift_valid_types_to_typed_collection(): void {
		$collection = new Typed_Collection();

		$collection->unshift( $this->createMock( Type_A::class ) );
		$collection->unshift( $this->createMock( Type_B::class ) );

		// Should only have 2 classes
		$this->assertCount( 1, $collection );

		// Check all Sample_Class types.
		foreach ( $collection->to_array() as $class ) {
			$this->assertInstanceOf( Type_A::class, $class );
		}
	}
}
