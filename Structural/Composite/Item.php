<?php

namespace Structural\Composite;

class Item implements ProductInterface
{
    const PRICE = '300';
    public function getPrice()
    {
        return self::PRICE;
    }
}
 