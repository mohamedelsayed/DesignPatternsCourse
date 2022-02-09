<?php

namespace Tests;

use Creational\StaticFactory\BenzCar;
use Creational\StaticFactory\BMWCar;
use Creational\StaticFactory\StaticFactory;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{
    public function testCanCreateBMWCar()
    {
        $this->assertInstanceOf(BMWCar::class, StaticFactory::factory('BMW'));
    }
    public function testCanCreateBenzCar()
    {
        $this->assertInstanceOf(BenzCar::class, StaticFactory::factory('Benz'));
    }
}
