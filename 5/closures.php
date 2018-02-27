<?php

  // Closures in php sono le "funzioni anonime che siamo abituati ad utilizzare in js".

  $products = [
    'Tires'       => 100,
    'Oil'         => 10,
    'Spark Plugs' => 4
  ];

  $markup = 0.20;

  $printer = function($value){
    echo "$value<br>";
  };

  // funzione anonima detta closure che svolge un operazione con ogni elemento dell'array. usanso il costrutto use() passo una variabile globale all'interno della funzione
  $apply = function(&$value) use($markup){
    $value = $value * (1+$markup);
  };

  // array walk serve per fare operazione sull'array senza tornare un nuovo array
  array_walk($products, $apply);
  array_walk($products, $printer);


  // array walk serve per fare operazione sull'array tornando un nuovo array
  $products2 = array_map( function($value) use($markup){
    return $value * (1+$markup);
  }, $products);

  print_r($products2);



?>