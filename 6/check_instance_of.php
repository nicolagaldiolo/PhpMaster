<?php

class A {
  public function echoClassMessage(){
    echo 'This is A class';
  }
}

class B extends A{
  public function echoClassMessage(){
    echo 'This is B class';
  }
}

class DisplayTable{
  public function echoClassMessage(){
    echo 'This is DisplayTable class';
  }
}


$b = new B;
//$b->echoClassMessage();

// verifico se un oggetto è istanza di una classe o meno
var_dump($b instanceof A); //bool(true)
var_dump($b instanceof B); //bool(true)
var_dump($b instanceof DisplayTable); //bool(false)