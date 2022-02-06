<?php

namespace Tests;

use Creational\FactoryMethod\BenzBrand;
use Creational\FactoryMethod\BenzBrandFactory;
use Creational\FactoryMethod\BMWBrand;
use Creational\FactoryMethod\BMWBrandFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testCanBuildBMWBrand()
    {
        $brandFactory = new BMWBrandFactory();
        $mybrand = $brandFactory->BuildBrand();
        $this->assertInstanceOf(BMWBrand::class, $mybrand);
    }
    public function testCanBuildBenzBrand()
    {
        $brandFactory = new BenzBrandFactory();
        $mybrand = $brandFactory->BuildBrand();
        $this->assertInstanceOf(BenzBrand::class, $mybrand);
    }
}
