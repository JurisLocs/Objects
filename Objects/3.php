<?php

class FuelGauge{
    private int $fuel;
    public function __construct($fuel)
    {
        $this->fuel = $fuel;
    }
    public function getFuel(): int
    {
        return $this->fuel;
    }
    public function setFuel(int $fuel): void
    {
        $this->fuel = $fuel;
    }

    public function fill():void{
        if($this->fuel < 70){
            $this->fuel++;
        }else{
            echo "Tank is full" . PHP_EOL;
        }

    }
    public function burn():void{
        if($this->fuel >0){
            $this->fuel--;
        }else{
            echo "Out of gas" . PHP_EOL;
        }
    }
}

class Odometer{
    private int $mileage;
    private int $counter = 0;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }
    public function getMileage(): int
    {
        return $this->mileage;
    }
    public function drive(FuelGauge $fuel){
        $this->counter++;
        if($this->mileage > 999999){
            $this->mileage = 0;
        }
        $this->mileage++;
        if($this->counter >= 10){
            $this->counter = 0;
            $fuel->burn();
        }
    }
}

$tank = new FuelGauge(50);
$odometer = new Odometer(10000);

for($i=0; $i<=10; $i++){
    $tank->fill();
    echo $tank->getFuel() . "   " . PHP_EOL;

}

for($i=0; $i<=30; $i++){
    $odometer->drive($tank);
    echo $odometer->getMileage() . "   " . PHP_EOL;
    echo $tank->getFuel() . "   " . PHP_EOL;
}