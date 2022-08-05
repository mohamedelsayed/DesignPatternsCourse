<?php

namespace Behavioral\Observer;

use SplObserver;
use SplSubject;

class Casher implements SplObserver
{
    private $state;

    public function update(SplSubject $subject): void
    {
        /**
         * @var Restaurant $subject
         */
        $this->state = sprintf("Casher is ready for order number %d", $subject->getOrderNumber());
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }
}
