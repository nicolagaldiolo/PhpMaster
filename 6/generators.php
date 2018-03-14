<?php

// il generatore è un modo per iterare dei dati in maniera particolare
// viene usato il costrutto yield

function firebuzz($start, $stop){
  $current = $start;
  while($current <= $stop){
    if($current % 3 == 0 && $current % 5 == 0){
      yield "fizzbuzz";
    }else if($current % 3 == 0){
      yield "fizz";
    }else if($current % 5 == 0){
      yield "buzz";
    }else{
      yield $current;
    }
    $current++;
  }
}

// alla prima chiamata della funzione firebuzz() viene creato implicitamente un oggetto generator
// quando la funzione viene chiamata viene eseguito il codice e viene "tornata" al contesto chiamante 
// la prima dichiarazione yield trovata


foreach(firebuzz(2,20) as $number){
  var_dump($number);
}

// Se hai bisogno di un modello mentale per questo, puoi pensarlo come un tipo di matrice di 
// fantasia dei valori possibili. La differenza fondamentale tra un generatore e, ad esempio, 
// una funzione che riempie un array con tutti i valori possibili, è che utilizza l'esecuzione lenta. 
// Solo un valore viene creato e tenuto in memoria in qualsiasi momento. 
// Ciò rende i generatori particolarmente utili quando si tratta di dataset di grandi dimensioni
// che non si adattano facilmente alla memoria.