<?php

// Un altro punto da notare quando si serializzano le classi o le si usano come variabili di sessione: 
// PHP deve conoscere la struttura di una classe prima di poter ricostituire la classe. Pertanto, è necessario includere il 
//file di definizione della classe prima di chiamare session_start () o unserialize ().

require('employee.php');
session_start();

$employee = new employee;
$employee->name = "Nicola";
$employee->employee_id = 5324;

$serialize_obj = serialize($employee);

$_SESSION['serialize_obj'] = $serialize_obj;

?>

<a href="serialization_session_page2.php">Vai a pagina2</a>