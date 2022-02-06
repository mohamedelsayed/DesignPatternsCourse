<?php

namespace Creational\FactoryMethod;

class BenzBrandFactory implements BrandFactory
{
    public function BuildBrand()
    {
        return new BenzBrand();
    }
}