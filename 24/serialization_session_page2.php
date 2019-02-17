<?php

// Un altro punto da notare quando si serializzano le classi o le si usano come variabili di sessione: 
// PHP deve conoscere la struttura di una classe prima di poter ricostituire la classe. Pertanto, è necessario includere il 
//file di definizione della classe prima di chiamare session_start () o unserialize ().

require('employee.php');
session_start();

echo '<pre>', var_dump($_SESSION), '</pre>';
echo '<pre>', var_dump(unserialize($_SESSION['serialize_obj'])), '</pre>';

?>