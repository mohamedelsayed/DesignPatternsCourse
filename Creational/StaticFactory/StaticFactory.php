<?php

namespace Creational\StaticFactory;

class StaticFactory
{
    public static function factory(string $type)
    {
        if ($type === 'BMW') {
            return new BMWCar();
        }
        if ($type === 'Benz') {
            return new BenzCar();
        }
        return null;
    }
}
