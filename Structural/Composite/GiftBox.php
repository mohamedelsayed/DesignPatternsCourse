<?php

namespace Structural\Composite;

class GiftBox implements ProductInterface, GiftInterface
{
    /**
     * @var int    
     */
    private $price;

    /**
     * @var int     
     */
    private $giftPrice;

    public function __construct(int $price, int $giftPrice)
    {
        $this->price = $price;
        $this->giftPrice = $giftPrice;
    }

    public function getPrice()
    {
        return $this->giftPackagePrice() + $this->price;
    }

    public function giftPackagePrice()
    {
        return $this->giftPrice;
    }
}
