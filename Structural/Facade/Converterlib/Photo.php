<?php

namespace Structural\Facade\Converterlib;

class Photo
{
    private string $type = '';

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    public function __toString()
    {
        return $this->type;
    }
}
