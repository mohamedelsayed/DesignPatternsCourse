<?php

namespace Behavioral\Iterator;

class City
{
    private $name;
    private $area;
     
    public function __construct(string $name, int $area)
    {
        $this->name = $name;
        $this->area = $area;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
}
