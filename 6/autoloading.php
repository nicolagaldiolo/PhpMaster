<?php
  
  // metodo classico (utilizzando include) di includere le classi
  include "classes/class.Foo.php";
  $foo = new Foo;
  $foo->start();
  $foo->stop();

  
  // metodo automatico di includere le classi nel progetto
  // quando istanzio una classe inplicitamente viene invocata la funzione __autoplay che riceve come parametro 
  // il nome della classe
  function __autoload($class_name) {
    require_once $DOCUMENT_ROOT . "classes/class/" . $class_name . ".php";
  }
 
  $foo = new Foo;
  $foo->start();
  $foo->stop();