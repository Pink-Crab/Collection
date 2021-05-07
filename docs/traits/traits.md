---
description: >-
  The PinkCrab Collection with a selection of utility traits that can be used to
  create custom collections.
---

# Traits

### Sequence 

> PinkCrab\Collection\Traits\Sequence

This provides additional methods, for working with your collection as a sequence of values. 

* [reverse\(\)](./trait-sequence.md#sequence-reverse)
* [reversed\(\)](./trait-sequence.md#sequence-reversed)
* [rotate\(\)](./trait-sequence.md#sequence-rotate)
* [first\(\)](./trait-sequence.md#sequence-first)
* [last\(\)](./trait-sequence.md#sequence-last)
* [sum\(\)](./trait-sequence.md#sequence-sum)

### Indexed

> PinkCrab\Collection\Traits\Indexed

This provides additional methods for using the collection as a key =&gt; value data store. Still uses an array under the hood, so only alphanumerical values can be used as keys.

* [has\(\)](./trait-indexed.md#indexed-has)
* [get\(\)](./trait-indexed.md#indexed-get)
* [set\(\)](./trait-indexed.md#indexed-set)
* [find\(\)](./trait-indexed.md#indexed-find)
* [remove\(\)](./trait-indexed.md#indexed-remove)

### Has_ArrayAccess

> PinkCrab\Collection\Traits\Has_ArrayAccess

Combined with the ArrayAccess interface, this will give full array access to the collection.

* [offsetSet\(\)](./trait-has_arrayaccess.md#offsetget-offset-)
* [offsetExists\(\)](./trait-has_arrayaccess.md#offsetExists-offset-)
* [offsetUnset\(\)](./trait-has_arrayaccess.md#offsetUnset-offset-)
* [offsetGet\(\)](./trait-has_arrayaccess.md#offsetGet-offset-)

### Is_Iterable

> PinkCrab\Collection\Traits\Is_Iterable

Combined with the Iterable interface, this allow while and foreach loops to be proformed on the collection.

* [rewind\(\)](./trait-is_iterable.md#rewind)
* [current\(\)](./trait-is_iterable.md#current)
* [key\(\)](./trait-is_iterable.md#key)
* [next\(\)](./trait-is_iterable.md#next)
* [valid\(\)](./trait-is_iterable.md#valid)

