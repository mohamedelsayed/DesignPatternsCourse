<?php

namespace Creational\Builder;

use Creational\Builder\Models\BMWCar;
use Creational\Builder\Models\Car;

class BMWCarBuilder implements CarBuilderInterface
{
    /** 
    @var Car $type 
     */
    private $type;
    public function createCar()
    {
        $this->type = new BMWCar();
    }
    public function addEngine()
    {
        $this->type->setPart('engine', 'engine');
    }
    public function addDoors()
    {
        $this->type->setPart('door', 'door');
    }
    public function addBody()
    {
        $this->type->setPart('body', 'body');
    }
    public function addWheels()
    {
        $this->type->setPart('wheel', 'wheel');
    }

    public function getCar(): Car
    {
        return $this->type;
    }
}
