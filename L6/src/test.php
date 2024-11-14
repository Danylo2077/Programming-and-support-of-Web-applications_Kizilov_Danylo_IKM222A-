<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    $account1 = new BankAccount("USD", 100);
    $account1->deposit(50);
    $account1->withdraw(30);
    echo "Поточний баланс: {$account1->getBalance()} USD\n";

    $savings = new SavingsAccount("USD", 200);
    SavingsAccount::setInterestRate(0.05); //  ставка 5%
    $savings->applyInterest();
    $savings->withdraw(50);
    $savings->deposit(100);
    echo "Поточний баланс накопичувального рахунку: {$savings->getBalance()} USD\n";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
