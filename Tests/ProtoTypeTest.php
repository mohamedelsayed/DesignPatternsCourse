<?php

namespace Tests;

use Creational\ProtoType\AutomaticCarProtoType;
use Creational\ProtoType\ManualCarProtoType;
use PHPUnit\Framework\TestCase;

class ProtoTypeTest extends TestCase
{
    public function testCanCreateAutomaticCarsWithClone()
    {
        $automaticPrototypeCar = new AutomaticCarProtoType();
        for ($i = 1; $i <= 10; $i++) {
            $newCar = clone $automaticPrototypeCar;
            $this->assertInstanceOf(AutomaticCarProtoType::class, $newCar);
        }
    }

    public function testCanCreateManualCarsWithClone()
    {
        $manualPrototypeCar = new ManualCarProtoType();
        for ($i = 1; $i <= 10; $i++) {
            $newCar = clone $manualPrototypeCar;
            $this->assertInstanceOf(ManualCarProtoType::class, $newCar);
        }
    }
}
