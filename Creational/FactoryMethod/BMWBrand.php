<?php

namespace Creational\FactoryMethod;

use Creational\FactoryMethod\CarBrandInterface;

class BMWBrand implements CarBrandInterface
{
    public function createBrand()
    {
        return "BMW Brand";
    }
}
