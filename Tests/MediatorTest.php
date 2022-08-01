<?php

namespace Tests;

use Behavioral\Mediator\LeftRoad;
use Behavioral\Mediator\RightRoad;
use Behavioral\Mediator\Road;
use Behavioral\Mediator\RoadLightMediator;
use PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
    private $lightMediator;
    private $rightRoad;
    private $leftRoad;

    protected function setUp(): void
    {
        $this->rightRoad = new RightRoad();
        $this->leftRoad = new LeftRoad();
        $this->lightMediator = new RoadLightMediator($this->rightRoad, $this->leftRoad);
    }

    public function testCanMoveRightRoadBasedOnLeftRoad()
    {
        $this->lightMediator->action($this->leftRoad, Road::STOP_EVENT);
        self::assertEquals(Road::MOVE_EVENT, $this->rightRoad->getRoadStatus());
    }
  
    public function testCanStopRightRoadBasedOnLeftRoad()
    {
        $this->lightMediator->action($this->leftRoad, Road::MOVE_EVENT);
        self::assertEquals(Road::STOP_EVENT, $this->rightRoad->getRoadStatus());
    }

    public function testCanMoveLeftRoadBasedOnRightRoad()
    {
        $this->lightMediator->action($this->rightRoad, Road::STOP_EVENT);
        self::assertEquals(Road::MOVE_EVENT, $this->leftRoad->getRoadStatus());
    }

    public function testCanStopLeftRoadBasedOnRightRoad()
    {
        $this->lightMediator->action($this->rightRoad, Road::MOVE_EVENT);
        self::assertEquals(Road::STOP_EVENT, $this->leftRoad->getRoadStatus());
    }
  
}
