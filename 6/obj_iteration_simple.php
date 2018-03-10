<?php

  class myObj {
    public $a = 1;
    public $b = 2;
    public $c = 3;
    public $d = 4;
    public $e = 5;

    public function first(){
      echo 'this the first method';
    }
    public function second(){
      echo 'this the second method';
    }
  }

  $obj = new myObj;
  
  // utilizzando un foreach posso iterare tutti gli ATTRIBUTI di una classe come se fosse un array
  foreach($obj as $attribute){
    var_dump($attribute);
  }

  // int(1)
  // int(2)
  // int(3)
  // int(4)
  // int(5)