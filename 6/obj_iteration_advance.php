<?php

// Classe che riceve in input un oggetto e mette a disposizione dei metodi per iterarlo e operare sui dati
class ObjectIterator implements Iterator {

  private $obj; // oggetto che viene passato in input
  private $count; // salvo la lunghezza dell'array passata
  private $currentIndex; // salvo l'idice attuale del puntatore

  function __construct($obj){
    $this->obj = $obj;
    $this->count = count($this->obj->data);
  }
  function rewind(){
    $this->currentIndex = 0;
  }
  
  function valid(){
    return $this->currentIndex < $this->count;
  }
  
  function key(){
    return $this->currentIndex;
  }
  
  function current(){
    return $this->obj->data[$this->currentIndex];
  }

  function next(){
    $this->currentIndex++;
  }
}

// oggetto su cui andiamo a lavorare
class Object implements IteratorAggregate{
  public $data = array();

  function __construct($in){
    $this->data = $in;
  }
  
  // getIterator() mi torna un nuovo oggetto contenente la struttura dati che gli abbiamo passato e i metodi per iterare i dati
  function getIterator(){
    return new ObjectIterator($this);
  }
}

$myObject = new Object(array(2, 4, 6, 8, 10));

// Il motivo dell'utilizzo di una classe iteratore come questa è che l'interfaccia per i dati non cambierà anche se l'implementazione 
// sottostante cambia. In questo esempio, la classe IteratorAggregate è una matrice semplice. Se decidi di cambiarlo in una tabella hash o in 
// una lista collegata, puoi comunque utilizzare un Iterator standard per attraversarlo, anche se il codice Iterator cambierebbe.

$myIterator = $myObject->getIterator();
for($myIterator->rewind(); $myIterator->valid(); $myIterator->next()){
  echo $myIterator->key() . " => " . $myIterator->current() ."<br />";
}