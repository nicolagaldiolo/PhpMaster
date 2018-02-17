<?php
  $total = 12.4;
  $first_string = "PRIMA STRINGA";
  $second_string = "SECONDA STRINGA";

  // VERSIONE CHE LAVORA CON STRINGHE
  //printf() - Stampa il valore (output)
  //sprintf() - Torna il valore (return)
  
  // VERSIONE CHE LAVORA CON ARRAY
  //vprintf() - Stampa il valore (output)
  //vsprintf() - Torna il valore (return)

  printf("%.2f", $total);
  echo '<hr>';
  printf("%.3f", $total);
  echo '<hr>';
  printf("Stampo una stringa con 2 segnaposti, uno qui: %s mentre l'altro lo stampo qui: %s", $first_string, $second_string);
  echo '<hr>';
  printf("%-.3f", $total);

  
  echo '<hr>';

  $s = 'monkey';
  $t = 'many monkeys';
  
  printf("[%s]\n",      $s); // standard string output
  echo '<hr>';
  printf("[%''10s]\n",    $s); // right-justification with spaces
  echo '<hr>';
  printf("[%-20s]\n",   $s); // left-justification with spaces
  echo '<hr>';
  printf("[%010s]\n",   $s); // zero-padding works on strings too
  echo '<hr>';
  printf("[%'#10s]\n",  $s); // use the custom padding character '#'
  echo '<hr>';
  printf("[%10.10s]\n", $t); // left-justification but with a cutoff of 10 characters
  echo '<hr>';
  echo sprintf("%'x90.10f\n", 123);
  echo '<hr>';
  echo sprintf("%'x-90.1d\n", 123);
  echo '<hr>';
  echo sprintf("%'.09d\n", 123);
  echo '<hr>';

  $mystring = "1987-21-08";
  $myarr = explode("-", $mystring); // array(3) { [0]=> string(4) "1987" [1]=> string(2) "21" [2]=> string(2) "08" }

  vprintf("[%010d-%02d-%02d]", $myarr); // si comporta come printf solo che accetta un array di elementi

?>