<?php
  
  // metodo classico (utilizzando include) di includere le classi
  //include "demo/class.Foo.php";
  //$foo = new Foo;
  //$foo->start();
  //$foo->stop();

  
  // metodo automatico di includere le classi nel progetto
  // quando istanzio una classe inplicitamente viene invocata la funzione __autoload che riceve come parametro 
  // il nome della classe

  $document_root = $_SERVER['DOCUMENT_ROOT'];
  
  function __autoload($class_name) {
    global $document_root;
    require_once $document_root . "/6/demo/class.".$class_name.".php";
  }
 
  $foo = new Foo;
  $foo->start();
  $foo->stop();