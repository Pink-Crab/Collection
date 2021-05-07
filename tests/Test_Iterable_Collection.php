<?php

declare(strict_types=1);
/**
 * Base collection tests.
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Core\Tests\Collection;

use stdClass;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;
use PinkCrab\Collection\Tests\Fixtures\Iterable_Collection;

class Test_Iterable_Collection extends TestCase {

	/** @testdox It should be possible to make a collection useable in a foreach loop using the iterable trait. */
	public function test_can_use_in_foreach(): void {
		$collection = new Iterable_Collection( array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ) );
		$counter    = 0;
		foreach ( $collection as $value ) {
			$this->assertEquals( $counter, $value );
			++$counter;
		}
	}

	/** @testdox It should be possible to advance and rewind the array pointer */
	public function test_can_advance_and_rewind_pointer(): void {
		$collection = new Iterable_Collection( array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ) );

		$this->assertEquals( 0, $collection->current() );
		$this->assertEquals( 0, $collection->key() );

		$collection->next();
		$this->assertEquals( 1, $collection->current() );
		$this->assertEquals( 1, $collection->key() );

		$collection->next();
		$this->assertEquals( 2, $collection->current() );
		$this->assertEquals( 2, $collection->key() );

		$collection->next();
		$this->assertEquals( 3, $collection->current() );
		$this->assertEquals( 3, $collection->key() );

		$collection->rewind();
		$this->assertEquals( 0, $collection->current() );
		$this->assertEquals( 0, $collection->key() );
	}

}
