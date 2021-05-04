<?php


class MyClass {
    const CONST_VALUE = 'A constant value';

   public $hello="dvxcbvbc";


   public function hello() {
       $this->hello = true;
        return "okkkk";
    }

}

$classname = new MyClass;

echo $classname::CONST_VALUE;

echo "\n";
echo "\n";

echo MyClass::CONST_VALUE;

echo "\n";

echo MyClass::hello();
