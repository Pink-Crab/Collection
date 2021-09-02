<?php

declare(strict_types=1);
/**
 * Base Collection.
 *
 * Can be extended and used with supplied traits.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package PinkCrab\Collection
 * @since 0.2.0
 */

namespace PinkCrab\Collection\Helpers;

class Comparisons {

	/**
	 * Returns the for_object_values as lambda.
	 *
	 * @since 0.2.0
	 * @return callable(mixed:$a,mixed:$b): int
	 */
	public static function by_values(): callable {
		/**
		 * @param mixed $a
		 * @param mixed $b
		 * @return int
		 */
		return function( $a, $b ): int {
			return ( new self() )->for_object_values( $a, $b );
		};
	}

	/**
	 * Returns the for_object_instances as lambda.
	 *
	 * @since 0.2.0
	 * @return callable(mixed:$a,mixed:$b): int
	 */
	public static function by_instances(): callable {
		/**
		 * @param mixed $a
		 * @param mixed $b
		 * @return int
		 */
		return function( $a, $b ): int {
			return ( new self() )->for_object_instances( $a, $b );
		};
	}

	/**
	 * Checks if the array contains objects.
	 *
	 * @param array<int|string, mixed> $data
	 * @return bool
	 */
	public static function contains_object( array $data ): bool {
		foreach ( $data as $datum ) {
			if ( \is_array( $datum ) || \is_object( $datum ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Compares two values, if encounters an object will match on instance.
	 *
	 * @since 0.2.0
	 * @param mixed $a
	 * @param mixed $b
	 * @return int
	 */
	public function for_object_values( $a, $b ): int {

		if ( \is_object( $a ) && ! \is_object( $b ) ) {
			return 1;
		}

		if ( \is_object( $b ) && ! \is_object( $a ) ) {
			return -1;
		}

		if ( \is_object( $a ) && \is_object( $b ) ) {
			return $a == $b ? 0 : -1; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
		}

		if ( is_bool( $a ) || is_bool( $b ) ) {
			return $a <=> $b;
		}

		if ( $a === $b ) {
			return 0;
		}
		return $a > $b ? 1 : -1;
	}

	/**
	 * Compares two values, if encounters an object will match on instance.
	 *
	 * @since 0.2.0
	 * @param mixed $a
	 * @param mixed $b
	 * @return int
	 */
	public function for_object_instances( $a, $b ): int {
		if ( $a === $b ) {
			return 0;
		}

		if ( \is_object( $a ) && \is_object( $b ) ) {
			return \spl_object_hash( $a ) > \spl_object_hash( $b ) ? 1 : -1;
		}

		if ( \is_object( $a ) && ! \is_object( $b ) ) { // @phpstan-ignore-line
			return 1;
		}

		if ( \is_object( $b ) && ! \is_object( $a ) ) {
			return -1;
		}

		return $a > $b ? 1 : -1;
	}
}
