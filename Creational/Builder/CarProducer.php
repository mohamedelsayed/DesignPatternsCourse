<?php

namespace Creational\Builder;

use Creational\Builder\Models\Car;

class CarProducer
{

    /**
     * @var CarBuilderInterface $builder 
     */
    private $builder;
    public function __construct(CarBuilderInterface $builder)
    {
        $this->builder = $builder;
    }
    public function produceCar(): Car
    {
        $this->builder->createCar();
        $this->builder->addBody();
        $this->builder->addDoors();
        $this->builder->addEngine();
        $this->builder->addWheels();
        return $this->builder->getCar();
    }
}
