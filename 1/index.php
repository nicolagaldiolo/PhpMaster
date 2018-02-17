<html>
<head>
    <title>Welcome to phpmaster.local</title>
</head>
<body>
  

<?php

// Superglobal
  echo '<pre>' , var_dump($_SERVER) , '</pre><br>';
  echo '<hr>';
  echo '<pre>' , var_dump($_ENV) , '</pre><br>';

  echo @(57/0); // previene l'emissione di errore

  $out = `ls -la`; // lancio comandi via shell
  echo '<pre>' . $out . '</pre>';


?>

</body>
</html>