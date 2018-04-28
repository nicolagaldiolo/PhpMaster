<?php
  
  
  $path = "/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17/interactingFileSystem/basename.php";
  
  // Torna il path escluso il nome del file
  var_dump(dirname($path)); //'/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17/interactingFileSystem'
  
  // Torna il nome del file escludo il path
  var_dump(basename($path)); //'basename.php'