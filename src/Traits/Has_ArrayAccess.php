<?php

declare(strict_types=1);
/**
 *
 * Adds in a selection of methods for using a collection as a sequence.
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
 * @phpcs:disable WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid, conforms to ArrayAccess interface
 */

namespace PinkCrab\Collection\Traits;

trait Has_ArrayAccess {

	/**
	 * Sets a value based on the offset passed.
	 *
	 * @param string|int $offset
	 * @param mixed $value
	 * @return void
	 */
	public function offsetSet( $offset, $value ) {

		if ( is_null( $offset ) ) {
			$this->data[] = $value;
		} else {
			$this->data[ $offset ] = $value;
		}
	}

	/**
	 * Checks if an offset exists
	 *
	 * @param string|int $offset
	 * @return bool
	 */
	public function offsetExists( $offset ) {
		return isset( $this->data[ $offset ] );
	}

	/**
	 * Unsets an off set
	 *
	 * @param string|int $offset
	 * @return void
	 */
	public function offsetUnset( $offset ) {
		unset( $this->data[ $offset ] );
	}

	/**
	 * Gets the value at the defined offset.
	 *
	 * @param string|int $offset
	 * @return mixed|null
	 */
	public function offsetGet( $offset ) {
		return isset( $this->data[ $offset ] ) ? $this->data[ $offset ] : null;
	}
}
