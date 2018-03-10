<?php

  // una classe statica non ha bisogno di essere instanziata quindi esiste una cola "istanza" della classe all'interno del sito o app
  // una classe statica viene creata allo stesso identico modo di una classe normale solo alcune accortezze:
  // i metodi statici hanno bisogno della keyword static e non si fa uso del this perché potrebbe non esserci alcuna istanza di oggetto a cui fare riferimento.

  class Math {
    
    public static function squared($input){
      return $input * $input;
    }

  }

  // per chiamare un metodo statico su una classe senza instanziare la classe occorre chiamarlo come di seguito
  echo Math::squared(8);