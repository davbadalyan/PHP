<?php

class A {
    public function __construct() {
        echo "A-construct<br>";
        $this->f1();
    }

    private function f1() {
        echo "A-private-f1<br>";
    }

    public function f2() {
        echo "A-public-f2<br>";
    }
}

class B  extends A {
    public function __construct() {
        parent::__construct();
        echo "B-construct<br>";
        $this->f2();
    }

}

// $a = new A();
// $a->f2();

$b = new B();
