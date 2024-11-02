<?php

class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $description, $price) {
        $this->name = $name;
        $this->description = $description;
        $this->setPrice($price);
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new InvalidArgumentException("Ціна не може бути від’ємною.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "Назва: $this->name\nЦіна: " . $this->getPrice() . "\nОпис: $this->description\n";
    }
}
?>
