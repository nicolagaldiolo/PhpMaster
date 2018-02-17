<?php

  //strstr() o alias strchr() — Find the first occurrence of a string
  //stristr()                 - version case sensitive of strstr()
  //strrchr()                 — Find the last occurrence of a character in a string
  
  //strpos()                  — Find the position of the first occurrence of a substring in a string
  //strrpos()                 — Find the position of the last occurrence of a substring in a string



  // strstr()
  // di default torna da dove trova corrispondenza fino alla fine della stringa
  // se passo un terzo parametro true mi torna dall'inizio della stringa fino alla prima corrispondenza
  $email  = 'name@example.com';
  $domain = strstr($email, '@');
  echo $domain; // prints @example.com

  echo '<hr>';

  // strrchr()
  // trova l'ultima corrispondenza della stringa
  $path = '/www/public_html/index.html';
  $filename = substr(strrchr($path, "/"), 1);
  echo $filename; // "index.html"

  echo '<hr>';

  // strpos()
  // trova la posizione della prima occorrenza della stringa
  // posso passae anche un offset indicando da dove partire a contare
  $email  = 'name@example.com';
  $domain = strpos($email, '@');
  echo $domain; // prints 4

  echo '<hr>';

  // strrpos()
  // trova la posizione dell'ultima corrispondenza della stringa
  // posso passae anche un offset indicando da dove partire a contare
  $path = '/www/public_html/index.html';
  echo strrpos($path, "/"); // prints 16

?>