<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Structural\Bridge\BenzCar;
use Structural\Bridge\BlueCar;
use Structural\Bridge\BMWCar;
use Structural\Bridge\RedCar;

class BridgeTest extends TestCase
{
    public function testCanCreateBlueBMWCar()
    {
        $carColor = new BlueCar();
        $car = new BMWCar($carColor);
        $this->assertEquals('the car type is BMW and the car color is blue', $car->getProduct());
    }

    public function testCanCreateRedBMWCar()
    {
        $carColor = new RedCar();
        $car = new BMWCar($carColor);
        $this->assertEquals('the car type is BMW and the car color is red', $car->getProduct());
    }

    public function testCanCreateBlueBenzCar()
    {
        $carColor = new BlueCar();
        $car = new BenzCar($carColor);
        $this->assertEquals('the car type is Benz and the car color is blue', $car->getProduct());
    }

    public function testCanCreateRedBenzCar()
    {
        $carColor = new RedCar();
        $car = new BenzCar($carColor);
        $this->assertEquals('the car type is Benz and the car color is red', $car->getProduct());
    }
}
