<?php

namespace Behavioral\Mediator;

class LeftRoad extends Road
{
    const ID = 'LEFT';
    public function getID(): string
    {
        return self::ID;
    }
}
