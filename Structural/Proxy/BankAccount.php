<?php

namespace Structural\Proxy;

class BankAccount implements BankAccountInterface
{
    private $transactions = [];

    public function deposit(int $amount)
    {
        $this->transactions[] = +$amount;
        return true;
    }

    public function withdraw(int $amount)
    {
        if ($this->getBalance() > $amount) {
            $this->transactions[] = -$amount;
            return $amount;
        } else {
            return false;
        }
    }

    public function getBalance(): int
    {
        return array_sum($this->transactions);
    }
}
