<?php

  // Overloading in PHP non è molto utile in quanto php permette nativamente di avere funzioni con parametri 
  // facoltativi e non è tipizzato. PHP implementa un concetto simile all'overloading:
  // quando viene utilizzato il metodo buil-it __call() tutte le chiamate a metodi della classe invocano 
  // implicitamente il metodo __call (di conseguenza non è necessario aver dichiarato per forza il metodo chiamato)
  // quando viene invocato il metodo __call() vengono passati 2 parametri: il metodo invocato, un array dei parametri passati al metodo

  class Overloading {
    
    public function __call($method, $p){
      
      // quando invoco il metodo display a seconda del tipo di dato passato (obj, array, string)
      // invoco uno specifico metodo interno simulando così l'overloading
      if($method == 'display'){
        if(is_object($p[0])){
          $this->display_object($p[0]);
        }else if(is_array($p[0])){
          $this->display_array($p[0]);
        }else{
          $this->display_string($p[0]);
        }
      }
    }

    private function display_object($obj){
      var_dump($obj);
    }

    private function display_array($arr){
      var_dump($arr);
    }

    private function display_string($string){
      var_dump($string);
    }

  }

  $overloading = new Overloading();
  $overloading->display( $obj = new MyObj );
  $overloading->display( array(1,2,3,4,5,6) );
  $overloading->display( "This is a string" );

  class MyObj{
    public $param_1 = "param1";
    public $param_2 = "param2";
    
    function print(){
      echo "this is a obj";
    }
  }