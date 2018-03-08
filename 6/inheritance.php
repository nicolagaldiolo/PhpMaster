<?php

  class main{
    
    public $attribute = "default value <br/>";
    
    static public function operator(){
      echo "default value <br/>";
    }

    public function printValue(){
      echo $this->attribute;
    }

    final function printValueFinal(){ // con final indico che il metodo non può essere sovrascritto
      echo $this->attribute;
    }

  }

  class subClass extends main {
    function __construct(){
      
      parent::operator(); // chiamo un metodo statico della Superclasse attraverso il costrutto parent
      $this->printValue();
      $this->printValueFinal();
    }

    // NON POSSO SOVRASCRIVERE QUESTO METODO PERCHè è DICHIARATO FINAL NELLA CLASSE GENITORE
    //public function printValueFinal(){ 
    //  echo $this->attribute;
    //}

  }

  $obj = new subClass;



  // con final indico che la classe non può essere estesa
  final class a{
    public $attribute = "default value class a <br/>";
  }

  // NON POSSO ESTENDERE LA CLASSE PERCHè LA CLASSE PADRE è DICHIARATA CON FINAL
  /*class b extends a {
    function __construct(){
      echo $this->attribute;
    }
  }*/

?>