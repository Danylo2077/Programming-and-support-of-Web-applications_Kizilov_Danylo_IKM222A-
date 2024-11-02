<?php

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $description, $price, $discount) {
        parent::__construct($name, $description, $price);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->getPrice() - ($this->getPrice() * ($this->discount / 100));
    }

    public function getInfo() {
        return parent::getInfo() . "Знижка: $this->discount%\nНова ціна: " . $this->getDiscountedPrice() . "\n";
    }
}
?>
