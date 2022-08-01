<?php

namespace Behavioral\Mediator;

class RoadLightMediator implements MediatorInterface
{
    private RightRoad $rightRoad;
    private LeftRoad $leftRoad;

    public function __construct(RightRoad $rightRoad, LeftRoad $leftRoad)
    {
        $this->rightRoad = $rightRoad;
        $this->rightRoad->setMediator($this);
        $this->leftRoad = $leftRoad;
        $this->leftRoad->setMediator($this);
    }
    public function action(Road $road, string $event)
    {
        if ($road->getID() == 'LEFT') {
            if ($event == Road::MOVE_EVENT) {
                $this->rightRoad->stop();
            }else{
                $this->rightRoad->move();
            }
        }
        if ($road->getID() == 'RIGHT') {
            if ($event == Road::MOVE_EVENT) {
                $this->leftRoad->stop();
            }else{
                $this->leftRoad->move();
            }
        }
    }
}
