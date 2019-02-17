<?php

// La serializzazione è il processo di trasformare tutto ciò che è possibile memorizzare in una variabile o un oggetto PHP 
// in un bytestream che può essere memorizzato in un database o trasferito tramite un URL da una pagina all'altra. 
// Senza questo processo, è difficile memorizzare o passare l'intero contenuto di un array o di un oggetto.

// prima dell'utilizzo delle sessioni veniva usata la serializzazione dei dati per trasferire dati da una richiesta http all'altra
// oggi le funzioni di controllo della sessione serializzano le variabili di sessione per memorizzarle tra richieste HTTP.

// le funzioni di serializzazione sono utili per salvare array o oggetti a db o su file, in quanto trasformano l'oggetto passato 
// in una stringa serializzata

// serialize = per serializzare i dati
// unserialize = per deserializzare i dati

require('employee.php');

$employee = new employee;
$employee->name = "Nicola";
$employee->employee_id = 5324;

$serialize_obj = serialize($employee);
echo var_dump($serialize_obj); 
//"O:8:"employee":2:{s:4:"name";s:6:"Nicola";s:11:"employee_id";i:5324;}";

$unserialize_obj = unserialize($serialize_obj);
echo var_dump($unserialize_obj); 
/*
object(employee)#2 (2) {
  ["name"]=>
  string(6) "Nicola"
  ["employee_id"]=>
  int(5324)
}
*/

// Un altro punto da notare quando si serializzano le classi o le si usano come variabili di sessione: 
// PHP deve conoscere la struttura di una classe prima di poter ricostituire la classe. Pertanto, è necessario includere il 
//file di definizione della classe prima di chiamare session_start () o unserialize ().