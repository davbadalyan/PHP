<?php 

// $newAge = 7;

// class Animal{
//     public $age = 0;
//     public $createdAt;
//     protected $owner;

//     public function increaseAge(int $value)
//     {
//         $this->age += $value;
//     }
//     public function name() {
//         return true;
//     }
    
//     public function getOwner() {
//         var_dump($this->owner);
//     }

//     public function setAge ($newAge) {
//         if($newAge >= 0 && $newAge < 100) {
//             $this->age = $newAge;
//         }
//     }

//     public function setOwner($newOwner) {
//         if(!is_null($newOwner)) {
//             $this->owner = $newOwner;
//         }
//     }

//     public function init() {
//         $this->createdAt = Date("d-m-Y");
//     }
    
// }

// $animal = new Animal();



// var_dump($animal instanceof Animal);
// var_dump($animal->age);
// // $animal->age = "Error";
// // $animal->increaseAge(4);
// // if($newAge >= 0) {
// //     $animal->age = $newAge;
// // }
// $animal->setAge($newAge);
// // var_dump($animal->age);
// // var_dump($animal->name());
// $animal->setOwner("Hendo");
// $animal->getOwner();
// // var_dump($animal->owner);
// $animal->init();
// var_dump($animal->createdAt);





class Product{
    public $shipping;
    public $currency;
    protected $price;

    protected $data = [
        "Russia" => ["shipping" => false, "currency" => "RUB"],
        "USA" => ["shipping" => true, "currency" => "$"],
        "Armenia" => ["shipping" => true, "currency" => "AMD"]
    ];

    public function setPrice($newPrice) {
        if(!is_null($newPrice)) {
            $this->price = $newPrice;
        }
    }

    public function getPrice() {
        var_dump($this->price);
    }

    public function init($country) {
        var_dump($this->data[$country]);
    }
}

$watch = new Product();

$watch->setPrice("$300");
// $watch->getPrice();
$watch->init("USA");