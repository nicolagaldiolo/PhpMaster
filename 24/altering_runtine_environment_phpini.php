<?php

// in alcuni casi è necessario modificare alcune impostazioni del php.ini al volo, in modo che abbia validità solo
// per la corrente esecuzione dello script

echo '<hr>';
$current_max_execution_time = ini_get('max_execution_time');
ini_set('max_execution_time', 120);
$new_max_execution_time = ini_get('max_execution_time');

echo 'the current timeout is ' . $current_max_execution_time. '<br/>'; //30
echo 'the new timeout is ' . $new_max_execution_time. '<br/>'; //120

// NB: LE VARIE IMPOSTAZIONI DI PHP SONO ESSERE CAMBIATE IN 4 LIVELLI:
// 1= httpd.conf
// 2= php.ini
// 3= .htaccess
// 4= all'interno dei vari script con la funzione ini_set()

// NB: NON TUTTE LE IMPOSTAZIONI POSSONO ESSERE CAMBIATE A LIVELLO DI SCRIPT
// PHP_INI_USER     | Puoi modificare questi valori nei tuoi script con ini_set().
// PHP_INI_PERDIR   | È possibile modificare questi valori nei file php.ini o in .htaccess o httpd.conf se si utilizza Apache. Il fatto che tu possa cambiarli in file .htaccess significa che puoi modificare questi valori su una base per directory.
// PHP_INI_SYSTEM   | È possibile modificare questi valori nei file php.ini o httpd.conf se si utilizza Apache.
// PHP_INI_ALL      | Puoi modificare questi valori in uno dei modi precedenti, ovvero in uno script, in un file .htaccess o nei tuoi file httpd.conf o php.ini.

// PER AVERE L'ELENCO COMPLETO DELLE DIRETTIVE VEDI QUI: http://php.net/manual/en/ini.list.php