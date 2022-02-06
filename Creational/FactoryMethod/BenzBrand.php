<?php
namespace Creational\FactoryMethod;

use Creational\FactoryMethod\CarBrandInterface;

class BenzBrand implements CarBrandInterface
{
    public function createBrand()
    {
     return 'Benz Brand';   
    }
}