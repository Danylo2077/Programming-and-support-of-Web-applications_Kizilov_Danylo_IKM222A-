<?php
// Підключення класів
require 'Product.php';
require 'DiscountedProduct.php';
require 'Category.php';

// Створення товарів
$product1 = new Product("Телефон", "Смартфон з великим екраном", 10000);
$product2 = new DiscountedProduct("Ноутбук", "Потужний ноутбук", 15000, 10);

// Створення категорії та додавання товарів
$category = new Category("Електроніка");
$category->addProduct($product1);
$category->addProduct($product2);

// Виведення інформації про товари в категорії Електроніка
echo "<h1>Електроніка</h1>";
$category->getProducts();
?>

