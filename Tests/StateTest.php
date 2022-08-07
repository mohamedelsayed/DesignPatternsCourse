<?php

namespace Tests;

use Behavioral\State\OrderContext;
use Behavioral\State\StateEnum;
use Behavioral\State\User;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    public function testCanCreateOrder(){
        $user = new User('John', '123 Main St', true);
        $order = new OrderContext($user);
        $this->assertEquals(StateEnum::CREATED_STATE, $order->getState()->getState());
    }

    public function testCanMoveOrderFromCreatedToArchivedOrrder(){
        $user = new User('John', '123 Main St', true);
        $order = new OrderContext($user);
        $order->orderProceed();
        $order->orderProceed();
        $order->orderProceed();
        $order->orderProceed();
        $order->orderProceed();

        $this->assertEquals(StateEnum::ARCHIVED_STATE, $order->getState()->getState());
    }

    public function testCanMoveOrderFromCreatedToCanceledOrrder(){
        $user = new User('John', '123 Main St', false);
        $order = new OrderContext($user);
        $order->orderProceed();
        $order->orderProceed();
        $order->orderProceed();
        // $order->orderProceed();

        $this->assertEquals(StateEnum::CANCELLED_STATE, $order->getState()->getState());
    }

}
