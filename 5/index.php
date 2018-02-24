<?php

  require('functions.php');
  
  $data = ['Primo valore', 'Secondo valore', 'Terzo valore', 'Quarto valore'];
  echo print_table($data, "Questo è l'header", "Questo è il content");
  
  echo '<hr>';
  var_args("param1", 2, "Param3");

  echo '<hr>';
  echo greater(5);

?>