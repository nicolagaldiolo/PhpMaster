<?php

// quando tento di stampare una classe viene implicitamente invocato il metodo __toString()
// se non viene trovato viene sollevato un errore
// var_export stampa fuori un array con tutti i valori della classe

class Myclass{
  public $value1 = "Valore 1";
  public $value2 = "Valore 2";
  public $value3 = "Valore 3";

  public function __toString(){
    return var_export($this, TRUE);
  }
}

$p = new MyClass;
echo $p;

// Myclass::__set_state(array(
//   'value1' => 'Valore 1',
//   'value2' => 'Valore 2',
//   'value3' => 'Valore 3',
// ))