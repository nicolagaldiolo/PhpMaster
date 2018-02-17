<?php
  
  //str_replace() — Replace all occurrences of the search string with the replacement string
  //substr_replace() — Replace text within a portion of a string

  // substr_replace() funziona allo stesso dopo di str_replace solo che dopo operare solo su una 
  // porzione della stringa passando dei parametri aggiuntivi

  $string = "Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa.";
  $new_string = str_replace("a", "xxxx", $string);
  echo $new_string;

  echo '<hr>';

  // i valori (sia le frasi, sia le parole da cercare, sia le parole di rimpiazzo posso essere array)
  $phrase  = array(
    "You should eat fruits, vegetables, and fiber every day.", 
    "You should eat fruits, vegetables, and fiber every day.", 
    "You should eat fruits, vegetables, and fiber every day."
  );
  
  $healthy = array("fruits", "vegetables", "fiber");
  $yummy   = array("pizza", "beer", "ice cream");

  echo '<pre>', var_dump(str_replace($healthy, $yummy, $phrase)), '</pre>';

  echo '<hr>';


  $input = array('A: XXX', 'B: XXX', 'C: XXX');

  // A simple case: replace XXX in each string with YYY.
  echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n";
  echo '<hr>';

  // A more complicated case where each replacement is different.
  $replace = array('AAA', 'BBB', 'CCC');
  echo implode('; ', substr_replace($input, $replace, 3, 3))."\n";
  echo '<hr>';
  
  // Replace a different number of characters each time.
  $length = array(1, 2, 3);
  echo implode('; ', substr_replace($input, $replace, 3, $length))."\n";

?>