<?php
  
  $path = "/home/httpd/html/index.php";
  
  // basename - Restituisce il nome del componente finale del percorso
  
  $file1 = basename($path);
  $file2 = basename($path, ".php"); // Se il componente del nome termina con suffisso, anche questo verrà troncato.
  
  var_dump($file1); //'index.php'
  var_dump($file2); //'index'