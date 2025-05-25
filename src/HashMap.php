<?php

namespace ArrayCollection;

class HashMap implements \ArrayAccess, \Countable, \IteratorAggregate
{
  private array $items = [];

  public function __construct(array $items = [])
  {
    if (!$this->isAssociativeArray($items)) {
      throw new \InvalidArgumentException('HashMap accepts only associative arrays');
    }
    $this->items = $items;
  }

  private function isAssociativeArray(array $array): bool
  {
    if (empty($array)) {
      return true;
    }
    return array_keys($array) !== range(0, count($array) - 1);
  }

  public function get($key, $default = null)
  {
    return $this->items[$key] ?? $default;
  }

  public function set($key, $value): self
  {
    $this->items[$key] = $value;
    return $this;
  }

  public function has($key): bool
  {
    return isset($this->items[$key]);
  }

  public function remove($key): self
  {
    unset($this->items[$key]);
    return $this;
  }

  public function clear(): self
  {
    $this->items = [];
    return $this;
  }

  public function keys(): array
  {
    return array_keys($this->items);
  }

  public function values(): array
  {
    return array_values($this->items);
  }

  public function toArray(): array
  {
    return $this->items;
  }

  // ArrayAccess implementation
  public function offsetExists($offset): bool
  {
    return $this->has($offset);
  }

  public function offsetGet($offset): mixed
  {
    return $this->get($offset);
  }

  public function offsetSet($offset, $value): void
  {
    $this->set($offset, $value);
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
