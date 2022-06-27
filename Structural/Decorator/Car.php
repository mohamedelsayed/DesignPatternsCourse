<?php

namespace Structural\Decorator;

class Car
{
    private $color = '';

    /**
     * Get the value of color
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     * @param string $color
     * @return  self
     */
    public function setColor($color)
    {
        $this->color .= $color;

        return $this;
    }
}
