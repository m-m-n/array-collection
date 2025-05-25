<?php

namespace ArrayCollection\Tests;

use ArrayCollection\Vector;
use PHPUnit\Framework\TestCase;

class VectorTest extends TestCase
{
  public function testConstructWithArray()
  {
    $vector = new Vector([1, 2, 3]);
    $this->assertEquals(1, $vector[0]);
    $this->assertEquals(2, $vector[1]);
    $this->assertEquals(3, $vector[2]);
  }

  public function testConstructWithEmptyArray()
  {
    $vector = new Vector();
    $this->assertCount(0, $vector);
  }

  public function testAdd()
  {
    $vector = new Vector();
    $vector->add(1);
    $this->assertEquals(1, $vector[0]);
  }

  public function testGet()
  {
    $vector = new Vector([1, 2, 3]);
    $this->assertEquals(1, $vector->get(0));
    $this->assertNull($vector->get(3));
    $this->assertEquals('default', $vector->get(3, 'default'));
  }

  public function testSet()
  {
    $vector = new Vector([1, 2, 3]);
    $vector->set(1, 4);
    $this->assertEquals(4, $vector[1]);
  }

  public function testSetOutOfBounds()
  {
    $vector = new Vector([1, 2, 3]);
    $this->expectException(\OutOfBoundsException::class);
    $vector->set(3, 4);
  }

  public function testRemove()
  {
    $vector = new Vector([1, 2, 3]);
    $vector->remove(1);
    $this->assertEquals(1, $vector[0]);
    $this->assertEquals(3, $vector[1]);
  }

  public function testRemoveOutOfBounds()
  {
    $vector = new Vector([1, 2, 3]);
    $this->expectException(\OutOfBoundsException::class);
    $vector->remove(3);
  }

  public function testClear()
  {
    $vector = new Vector([1, 2, 3]);
    $vector->clear();
    $this->assertCount(0, $vector);
  }

  public function testToArray()
  {
    $data = [1, 2, 3];
    $vector = new Vector($data);
    $this->assertEquals($data, $vector->toArray());
  }

  public function testCount()
  {
    $vector = new Vector([1, 2, 3]);
    $this->assertCount(3, $vector);
  }

  public function testIterator()
  {
    $data = [1, 2, 3];
    $vector = new Vector($data);
    $result = [];
    foreach ($vector as $index => $value) {
      $result[$index] = $value;
    }
    $this->assertEquals($data, $result);
  }
}
