<?php

class className{
  private $attribute = 10;

  /***************+ __get() __set()  
  Le funzioni __get e __set vengono chiamate implicitamente quando tento di accedere o settare degli attributi.
  Senza la funzione __get() non potrei accedere alla proprietà $attribute in quanto privata
  Potrei anche fare a meno di questo metodo, infatti, una proprietà può essere settata sull'oggetto anche senza la funzione __set() 
  ma con quella posso centralizzare l'accesso alle proprietà e ad esempio inserire dei validatori o filtare la creazione delle proprietà dell'oggetto.
  *////////////////////////////////////
  function __get($name){
    return $this->$name;
  }
  function __set($name, $value){
    if(($name=="attribute") && ($value >= 0) && ($value <= 100)) {
      $this->attribute = $value;
    }
  }

  function getAttribute(){
    echo $this->attribute;
  }

}

$a= new className;
$a->getAttribute();
echo '<hr>';
echo $a->attribute;
echo '<hr>';
$a->attribute = 100; // dato che ho inserito un filtro nel __set() il valore deve essere compreso tra 0 e 100
echo $a->attribute;
echo '<hr>';

?>