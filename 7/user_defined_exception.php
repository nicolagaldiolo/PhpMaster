<?php

// uso una classe custom per gestire gli errori
// l'unico vantaggio di usare una classe custom è che posso sovrascrivere il metodo __toString()
// e creare un metodo personalizzato

class myCustomError extends Exception {
  public function __toString(){
    return array(
      'Message' => $this->getMessage(),
      'Exception' => $this->getCode(),
      'File' => $this->getFile(),
      'On line' => $this->getLine(),
      'Trace' => $this->getTrace()
    ); // uso i metodo piuttosto che le proprietà in quanto le proprietà NON sono tutte public
  }
}

try {
  // in php le eccezioni vengono sollevate manualmente
  throw new myCustomError("A terrible error has occurred", 42);
}catch (myCustomError $e) { // dichiaro il tipo di classe che viene catturata e la variabile che contiene l'oggetto
  echo "<br>";
  echo '<pre>', var_dump($e->__toString()), '</pre>';
}finally{
  echo "<hr>\n Eseguo sempre questo blocco";
}