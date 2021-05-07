<?php

declare(strict_types=1);
/**
 *
 * Adds the required methods to make a collection Iterable.
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

trait Is_Iterable {
	/**
	 * Rewind the pointer
	 *
	 * @return mixed|null
	 */
	public function rewind() {
		return reset( $this->data );
	}

	/**
	 * Returns the current element
	 *
	 * @return mixed
	 */
	public function current() {
		return current( $this->data );
	}

	/**
	 * Returns the current element key
	 *
	 * @return string|int
	 */
	public function key() {
		return key( $this->data );
	}

	/**
	 * Returns the next element
	 *
	 * @return mixed|false
	 */
	public function next() {
		return next( $this->data );
	}

	/**
	 * Chekcks if the current pointer is valid
	 *
	 * @return bool
	 */
	public function valid() {
		return key( $this->data ) !== null;
	}
}
