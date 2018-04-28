<html>
<head>
  <title>Browse Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
  
  // come per i file (fopen(), fread(), fclose()) anche per le directory abbiamo le tre funzione per la gestione:
  // opendir(), readdir(), closedir()
  // NB: $dir = opendir() apre una directory per la lettura e $dir contiene l'handler (=risorsa) della directory, non un semplice elenco di file o directory
  
  $current_dir = "/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17";
  $dir = opendir($current_dir);
  
  echo '<p>Upload directory is ' . $current_dir . '</p>';
  echo '<p>Directory Listing:</p><ul>';
  
  while (false !== ($file = readdir($dir))){ // faccio avanzare il puntatore al prossimo file fino a quando non ne trovo piu quindi false
    echo '<li>' . $file . '</li>';
  }
  
  echo '</ul>';
  closedir($dir); // chiudo la directory
  
?>
</body>
</html>