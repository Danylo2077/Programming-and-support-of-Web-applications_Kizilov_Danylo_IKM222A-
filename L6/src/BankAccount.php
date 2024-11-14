<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($currency, $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення повинна бути позитивною.");
        }
        $this->balance += $amount;
        echo "Рахунок поповнено на {$amount} {$this->currency}. Поточний баланс: {$this->getBalance()} {$this->currency}.\n";
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути позитивною.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
        echo "Знято {$amount} {$this->currency}. Поточний баланс: {$this->getBalance()} {$this->currency}.\n";
    }

    public function getBalance() {
        return $this->balance;
    }
}
