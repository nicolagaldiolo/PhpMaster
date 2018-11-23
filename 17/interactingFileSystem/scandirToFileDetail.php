<html>
<head>
  <title>Scan Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
  
  // scandir() torna un array contenente il contenuto della cartella con possibilità di ordinare i risultati
  
  $dir = "/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17/interactingFileSystem";
  
  $list = scandir($dir);
  $list2 = scandir($dir, 1);
  echo '<ul>';
  foreach ($list as $file) {
      if($file != '.' && $file != '..'){
          echo '<li><a href="filedetails.php?file=' . $file . '">' . $file . '</a></li>';
      }
  }
    echo '</ul>';
?>
</body>
</html>