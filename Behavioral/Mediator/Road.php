<?php

namespace Behavioral\Mediator;

abstract class Road
{
    public const STOP_EVENT = 'stop';
    public const MOVE_EVENT = 'move';
    private MediatorInterface $mediator;
    private $roadStatus = '';

    public function __construct()
    {
    }

    abstract function getID(): string;

    public function move()
    {
        $this->roadStatus = self::MOVE_EVENT;
    }

    public function stop()
    {
        $this->roadStatus = self::STOP_EVENT;
    }

    /**
     * Get the value of roadStatus
     */ 
    public function getRoadStatus():string
    {
        return $this->roadStatus;
    }

    /**
     * Set the value of mediator
     *
     * @return  self
     */ 
    public function setMediator($mediator)
    {
        $this->mediator = $mediator;
    }
}
