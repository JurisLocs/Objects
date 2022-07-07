<?php
class Energy
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrus;

    public function __construct(int $surveyed, float $purchasedEnergyDrinks, float $citrus)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrus = $citrus;
    }

    /**
     * @return int
     */
    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

    /**
     * @param int $surveyed
     */
    public function setSurveyed(int $surveyed): void
    {
        $this->surveyed = $surveyed;
    }

    /**
     * @return float
     */
    public function getPurchasedEnergyDrinks(): float
    {
        return $this->purchasedEnergyDrinks;
    }

    /**
     * @param float $purchasedEnergyDrinks
     */
    public function setPurchasedEnergyDrinks(float $purchasedEnergyDrinks): void
    {
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
    }

    /**
     * @return float
     */
    public function getPreferCitrus(): float
    {
        return $this->preferCitrus;
    }

    /**
     * @param float $preferCitrus
     */
    public function setPreferCitrus(float $preferCitrus): void
    {
        $this->preferCitrus = $preferCitrus;
    }

    function calculate_energy_drinkers():int
    {
        return $this->surveyed * $this->purchasedEnergyDrinks;
    }

    function calculate_prefer_citrus():int
    {
        return $this->surveyed * $this->purchasedEnergyDrinks * $this->preferCitrus;

    }
}

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

$energy = new Energy($surveyed,$purchased_energy_drinks,$prefer_citrus_drinks);

echo "Total number of people surveyed " . $energy->getSurveyed() . PHP_EOL;
echo "Approximately " . $energy->calculate_energy_drinkers() . " bought at least one energy drink" . PHP_EOL;
echo $energy->calculate_prefer_citrus() . " of those " . "prefer citrus flavored energy drinks.". PHP_EOL;
