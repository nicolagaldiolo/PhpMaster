<html>
<head>
  <title>Browse Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
  
  // fondamentalmente uguale a opendir(), readdir(), closedir() ma con approccio OOP
  
  $dir = dir("/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17");
  
  echo '<p>Handle is ' . $dir->handle . '</p>';
  echo '<p>Upload directory is ' . $dir->path . '</p>';
  echo '<p>Directory Listing:</p><ul>';
  
  while (false !== ($file = $dir->read())){ // faccio avanzare il puntatore al prossimo file fino a quando non ne trovo piu quindi false
    echo '<li>' . $file . '</li>';
  }
  
  echo '</ul>';
  $dir->close(); // chiudo la directory

?>
</body>
</html>