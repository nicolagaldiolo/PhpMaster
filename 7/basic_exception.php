<?php

try {
  // in php le eccezioni vengono sollevate manualmente
  throw new Exception("A terrible error has occurred", 42);
}catch (Exception $e) { // dichiaro il tipo di classe che viene catturata e la variabile che contiene l'oggetto
  echo "<br>";
  
  echo "Exception ". $e->getCode(). "<br />";
  echo "Message: ". $e->getMessage(). "<br />"; 
  echo "File: " . $e->getFile(). "<br />";
  echo "On line ". $e->getLine(). "<br />";
  echo "Trace: ", print_r($e->getTrace()) , "<br />";
  echo "Trace as String: ". $e->getTraceAsString() . "<br />";
  echo "Error to string: ", $e->__toString(),  "<br />";

  //echo $e; // lo stesso risultato lo ottengo stampando $e;

}finally{
  echo "<hr>\n Eseguo sempre questo blocco";
}

echo "<hr>\n <h1>Struttura e metodi della classe Exception</h1>";

$error = new ReflectionClass("Exception");
echo '<pre>' . $error . '</pre>';