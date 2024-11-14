<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    private static $interestRate = 0.02; // 2% 

    public static function setInterestRate($rate) {
        if ($rate < 0) {
            throw new Exception("Відсоткова ставка повинна бути позитивною.");
        }
        self::$interestRate = $rate;
    }

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        echo "Додано відсотки у розмірі {$interest} {$this->currency}. Новий баланс: {$this->getBalance()} {$this->currency}.\n";
    }
}
