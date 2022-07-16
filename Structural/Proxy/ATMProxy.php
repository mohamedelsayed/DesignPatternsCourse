<?php

namespace Structural\Proxy;

class ATMProxy extends BankAccount implements BankAccountInterface
{

    public function getBalance(): int
    {
        return parent::getBalance();
    }
}
