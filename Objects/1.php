<?php

class Product{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }
    function printProduct(){
        echo "$this->name , price $this->startPrice, amount $this->amount";
        echo PHP_EOL;
    }
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    function set_price($price) {
        $this->startPrice = $price;
    }
    function get_price() {
        return $this->startPrice;
    }
    function set_amount($amount) {
        $this->amount = $amount;
    }
    function get_amount() {
        return $this->amount;
    }

}


$mouse = new Product("Logitech mouse", 70.00, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$thing = new Product("Epson EB-U05", 440.46, 1);

$mouse->printProduct();
$mouse->set_name("Razer mouse");
$mouse->printProduct();