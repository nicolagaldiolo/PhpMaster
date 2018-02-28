<?php

  class main{
    private function operator1(){
      echo "Operation 1 called <br>";
    }

    protected function operator2(){
      echo "Operation 2 called <br>";
    }

    public function operator3(){
      echo "Operation 3 called <br>";
    }
  }

  class subClass extends main {
    function __construct(){
      
      //$this->operator1(); // la chiamata a questo metodo va in errore perchè è privato e utilizzabile solo dalla classe main
      $this->operator2();
      $this->operator3();
      
    }
  }

  $obj = new subClass;
  //$obj->operator2(); // la chiamata a questo metodo va in errore perchè è protetto e utilizzabile solo all'interno della classe
  $obj->operator3(); 

?>