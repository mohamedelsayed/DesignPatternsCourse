<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Structural\Proxy\ATMProxy;

class ProxyTest extends TestCase
{
    public function testCanDepositFromATM()
    {
        $proxy = new ATMProxy();
        $proxy->deposit(1000);
        $proxy->deposit(5000);
        $this->assertEquals(6000, $proxy->getBalance());
    }

    public function testCanWithdrawFromATM()
    {
        $proxy = new ATMProxy();
        $proxy->deposit(1000);
        $proxy->deposit(5000);
        $proxy->withdraw(2000);
        $this->assertEquals(4000, $proxy->getBalance());
    }
}
