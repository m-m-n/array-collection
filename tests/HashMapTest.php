<?php

namespace ArrayCollection\Tests;

use ArrayCollection\HashMap;
use PHPUnit\Framework\TestCase;

class HashMapTest extends TestCase
{
  public function testConstructWithAssociativeArray()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $this->assertEquals('John', $map['name']);
    $this->assertEquals(30, $map['age']);
  }

  public function testConstructWithEmptyArray()
  {
    $map = new HashMap();
    $this->assertCount(0, $map);
  }

  public function testConstructWithNonAssociativeArray()
  {
    $this->expectException(\InvalidArgumentException::class);
    new HashMap([1, 2, 3]);
  }

  public function testGet()
  {
    $map = new HashMap(['name' => 'John']);
    $this->assertEquals('John', $map->get('name'));
    $this->assertNull($map->get('unknown'));
    $this->assertEquals('default', $map->get('unknown', 'default'));
  }

  public function testSet()
  {
    $map = new HashMap();
    $map->set('name', 'John');
    $this->assertEquals('John', $map['name']);
  }

  public function testHas()
  {
    $map = new HashMap(['name' => 'John']);
    $this->assertTrue($map->has('name'));
    $this->assertFalse($map->has('unknown'));
  }

  public function testRemove()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $map->remove('name');
    $this->assertFalse($map->has('name'));
    $this->assertTrue($map->has('age'));
  }

  public function testClear()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $map->clear();
    $this->assertCount(0, $map);
  }

  public function testKeys()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $this->assertEquals(['name', 'age'], $map->keys());
  }

  public function testValues()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $this->assertEquals(['John', 30], $map->values());
  }

  public function testToArray()
  {
    $data = ['name' => 'John', 'age' => 30];
    $map = new HashMap($data);
    $this->assertEquals($data, $map->toArray());
  }

  public function testCount()
  {
    $map = new HashMap(['name' => 'John', 'age' => 30]);
    $this->assertCount(2, $map);
  }

  public function testIterator()
  {
    $data = ['name' => 'John', 'age' => 30];
    $map = new HashMap($data);
    $result = [];
    foreach ($map as $key => $value) {
      $result[$key] = $value;
    }
    $this->assertEquals($data, $result);
  }
}
