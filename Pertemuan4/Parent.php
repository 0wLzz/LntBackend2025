<?php
Class Ayah{
    public $name = "Bambang";
    protected $alamat = "Jalan Serta Yesus";
    private $NIK = "111111111";

    //Getter
    function getNIK(){
        return $this->NIK;
    }

    //Setter
    function setNIK($NIK) {
        $this->NIK = $NIK;
    }
}

Class Anak extends Ayah{
    function displayAlamat(){
        echo $this->alamat;
    } 
}

$BCT = new Anak();
echo $BCT->name; //Output "Bambang"

echo $BCT->NIK; //Error karena bukan class sendiri

echo $BCT->alamat; //Error karena object yang manggil
$BCT->displayAlamat(); //Output karena Class yang manggil


class Person {
    private $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Animal {
    public function makeSound() {
        echo "Some sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

$dog = new Dog();
$dog->makeSound();


class Calculator {
    public static function add($a, $b) {
        return $a + $b;
    }
}

echo Calculator::add(5, 10);

