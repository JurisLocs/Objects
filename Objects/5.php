<?php

class Date{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }
    public function getMonth(): int
    {
        return $this->month;
    }
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }
    public function getYear(): int
    {
        return $this->year;
    }
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    function displayDate():string{
        return $this->day ."/". $this->month . "/". $this->year;
    }

}
function dateTest():void{
    $date = new Date(21,06,1997);
    echo $date->displayDate() . PHP_EOL;
    $date->setDay(01);
    echo $date->displayDate() . PHP_EOL;
    $date->setYear(2022);
    echo $date->displayDate() . PHP_EOL;
    $date->setMonth(07);
    echo $date->displayDate() . PHP_EOL;

}


dateTest();