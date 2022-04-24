<?php

namespace Structural\Composite;

class SimpleBox implements ProductInterface
{
    /** 
     * @var string 
     */
    private $price;
    public function __construct(string $price)
    {
        $this->price = $price;
    }
    public function getPrice(): string
    {
        return $this->price;
    }
}
