<?php

namespace Behavioral\Mediator;

class RightRoad extends Road
{
    const ID = 'RIGHT';
    public function getID(): string
    {
        return self::ID;
    }
}
