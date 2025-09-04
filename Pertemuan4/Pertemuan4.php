<?php

//SuperClass atau ParentClass
Class Person {
    //Bisa diakses oleh semua class
    public $name;  
    public $age;

     //Hanya bisa diakses oleh class sendiri dan ChildClass Sendiri
    protected $number;

    //Hanya bisa diakses oleh class sendiri 
    private $alamat;

    //Constructor
    public function __construct($name, $age, $number, $alamat) {
        $this->name = $name;
        $this->age = $age;
        $this->number = $number;
        $this->alamat = $alamat;
    }

    //Getter
    public function getAlamat():string{
        return $this->alamat;
    }

    //Setter
    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }

    //Method
    public function showInfo(){
        echo "Name: {$this->name} <br>";
        echo "Umur: {$this->age} <br>";
        echo "No Tel: {$this->number} <br>";
        echo "Alamat: {$this->alamat} <br>";
    }
}

//SubClass atau Child Class
//Inheritence (menggunakan extends)
Class Student extends Person{ 
    public $Kelas;

    //Constructor
    public function __construct($name, $age, $number, $alamat, $kelas) {
        //Manggil Constructor Parent Class/Super Class
        parent::__construct($name, $age, $number, $alamat);
        $this->Kelas = $kelas;
    }

    //Polymorphism (Overiding)
    public function showInfo() {
        parent::showInfo();
        echo "Kelas: {$this->Kelas} <br>";
    }
}

Class Teacher extends Person{
    public $MataPelajaran;

    //Constructor (Pada saat Object Terbuat)
    public function __construct($name, $age, $number, $alamat, $mapel) {
        //Manggil Constructor Parent Class/Super Class
        parent::__construct($name, $age, $number, $alamat); 
        $this->MataPelajaran = $mapel;
    }

    //Polymorphism (Overiding)
    public function showInfo() {
        parent::showInfo();
        echo "MaPel: {$this->MataPelajaran} <br>";
    }

    //Destructor (Pada saat Object Terhapus atau pada saat berhenti codingan)
    public function __destruct() {
        echo "I Quit!";
    }
}

$Orang = new Person("Orang", "10", "08123456789", "Jalan Dimana-mana");
echo var_dump($Orang) . "\n\n";

$Nemo = new Student("Nemo", "12", "08123456789", "Bikini Bottom", 5);
echo var_dump($Nemo) . "\n\n";

$BCT = new Teacher("Bambang Cak Telo", "35", "08111111111", "Jalan Serta Yesus", "AI");
echo var_dump($BCT) . "\n\n";