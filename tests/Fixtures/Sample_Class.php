<?php

declare(strict_types=1);

/**
 * Basic sample class with a single property
 *
 * @since 0.1.0
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 */

namespace PinkCrab\Collection\Tests\Fixtures;

class Sample_Class {

	/**
	 * Test property
	 *
	 * @var string
	 */
	public $property_a = 'Alpha';

	/**
	 * Get the value of property_a
	 */
	public function get_property_a(): string {
		return $this->property_a;
	}

	/**
	 * Set the value of property_a
	 *
	 * @return self
	 */
	public function set_property_a( string $property_a ): self {
		$this->property_a = $property_a;
		return $this;
	}
}
