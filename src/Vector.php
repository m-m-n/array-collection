<?php

namespace ArrayCollection;

class Vector implements \ArrayAccess, \Countable, \IteratorAggregate
{
  private array $items = [];

  public function __construct(array $items = [])
  {
    $this->items = array_values($items);
  }

  public function add($value): self
  {
    $this->items[] = $value;
    return $this;
  }

  public function get(int $index, $default = null)
  {
    return $this->items[$index] ?? $default;
  }

  public function set(int $index, $value): self
  {
    if ($index < 0 || $index >= count($this->items)) {
      throw new \OutOfBoundsException("Index out of bounds");
    }
    $this->items[$index] = $value;
    return $this;
  }

  public function remove(int $index): self
  {
    if ($index < 0 || $index >= count($this->items)) {
      throw new \OutOfBoundsException("Index out of bounds");
    }
    array_splice($this->items, $index, 1);
    return $this;
  }

  public function clear(): self
  {
    $this->items = [];
    return $this;
  }

  public function toArray(): array
  {
    return $this->items;
  }

  // ArrayAccess implementation
  public function offsetExists($offset): bool
  {
    return isset($this->items[$offset]);
  }

  public function offsetGet($offset): mixed
  {
    return $this->get($offset);
  }

  public function offsetSet($offset, $value): void
  {
    if (is_null($offset)) {
      $this->add($value);
    } else {
      $this->set($offset, $value);
    }
  }

  public function offsetUnset($offset): void
  {
    $this->remove($offset);
  }

  // Countable implementation
  public function count(): int
  {
    return count($this->items);
  }

  // IteratorAggregate implementation
  public function getIterator(): \ArrayIterator
  {
    return new \ArrayIterator($this->items);
  }
}
