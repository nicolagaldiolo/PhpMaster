<html>
<head>
  <title>Scan Directories</title>
</head>
<body>
<h1>Browsing</h1>
<?php
  
  // scandir() torna un array contenente il contenuto della cartella con possibilità di ordinare i risultati
  
  $dir = "/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17";
  
  $list = scandir($dir);
  $list2 = scandir($dir, 1);

    echo '<pre>', var_dump($list), '</pre>';
    echo '<pre>', var_dump($list2), '</pre>';

?>
</body>
</html>