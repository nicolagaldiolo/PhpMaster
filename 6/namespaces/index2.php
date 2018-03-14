<?php

// DICHIARO IL NAMESPACE relativo
namespace  myclass\page\test;

include "class.php";

$c = new Page();

// tutte le classe che uso qui dentro fanno riferimento al namespace dichiatato in alto. 
// Se QUI voglio far riferimento ad una classe del contesto GLOBALE devo dichiararla con uno slash davanti
//$var = \MyGlobalClass()

// per le costanti e le funzioni invece fanno riferimento al contesto corrente ma se non presenti vengono cercate nel contesto globale anche senza anteporre lo \