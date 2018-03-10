<?php

  // Un po come le interfacce le classi astratte definiscono la struttura che deve evere la classe
  // se una classe che estende classe astratta non include tutti i metodi dichiarati astratti nella 
  // classe stratta genero un errore.
  // i metodi astratti non possono avere un corpo
  // una classe stratta può includere metodi "normali" che vengono comuque ereditati e possono avere un corpo
  abstract class MyAbstractClass{
    
    abstract public function getValue();
    
    public function test(){
      echo "Questo è un metodo normale che viene ereditato";
    }

  }

  class MyClass extends MyAbstractClass{
    public function getValue(){
      echo 'Invocato metodo getValue';
    }
  }

  //$test = new MyAbstractClass; // non posso istanziare una classe astratta
  $test = new MyClass;
  $test->getValue();
  $test->test();

