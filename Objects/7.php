<?php

class Dog{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->father = NULL;
        $this->mother = NULL;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }
    public function setParents(Dog $mother,Dog $father){
        $this->father = $father;
        $this->mother= $mother;
    }
    public function fathersName():string{
        if($this->father!=null){
            return $this->father->name;
        }else{
            return "Unknown";
        }
    }
    public function hasSameMotherAs(Dog $dog1, Dog $dog2):bool{
        if($dog1->getMother() === $dog2->getMother()){
            return true;
        }else{
            return false;
        }
    }
}

$Max = new Dog("Max","male");
$Rocky = new Dog("Rocky", "male");
$Sparky = new Dog("Sparky", "male");
$Buster = new Dog("Buster", "male");
$Sam = new Dog("Sam", "male");
$Lady = new Dog("Lady", "female");
$Molly = new Dog("Molly", "female");
$Coco = new Dog("Coco", "female");

$Max->setParents($Lady,$Rocky);
$Coco->setParents($Molly,$Buster);
$Rocky->setParents($Molly,$Sam);
$Buster->setParents($Lady,$Sparky);

echo $Sparky->fathersName();

echo $Max->hasSameMotherAs($Max,$Buster);
echo $Max->hasSameMotherAs($Max,$Lady);