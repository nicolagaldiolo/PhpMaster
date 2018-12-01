<?php

// ELENCO TIMEZONES: http://php.net/manual/en/timezones.php

// Tutte le funzioni per gestire la date leggono iL parametro date.timezone settato nel file php.ini
// di default date.timezone non è settato quindi viene letto Default timezone che è settato a UTC (= Coordinated Universal Time )
// ossia il fuso orario di riferimento (Greenwich) da cui vengono calcolati tutti gli altri


setlocale(LC_TIME, "it_IT");


// Funzioni per gestire le date
echo '<hr>';
echo 'date (NON gestisce la localizzazione): ', date("F j, Y, g:i a e"), '<br>';            // March 10, 2001, 5:16 pm (NON GESTISCE LOCALE)
echo 'strftime (GESTISCE la localizzazione): ', strftime('%A | %x | %c | %Y'), '<br>';      // Sabato | 01.12.2018 | Sab 1 Dic 17:18:46 2018 | 2018 (GESTISCE LOCALE)
echo 'time: ', time(), '<br>';                                                                     // 1543671322
echo 'strtotime: ', strtotime("11.12.10"), '<br>';                                           // 1543671322
echo 'mktime: ', mktime(0, 0, 0, 8, 21, 1987), '<br>';      // 556495200



echo 'mktime: ', mktime(12, 0, 0), '<br>';                   // torna il timestamp delle ore 12 del giorno corrente
echo 'mktime: ', mktime(0, 0, 0, 1,1), '<br>';   // torna il timestamp del 1° Gennaio dell'anno corrente

$time = mktime(12, 0, 0, 8,45); // passando 12 sulle ore toglie alcuni problemi di calcolo dovuti all'ora legale
echo 'mktime Agosto (anno corrente) + 45days: ', date("F j, Y, g:i a e", $time), '<br>';

echo '<pre>', var_dump(getdate()), '</pre>'; // torna un array chiave=>valore con data, ora e timestamp. Accetta un custom timestamp come parametro

echo 'checkdate: ', var_dump(checkdate(2,30, 2018)), '<br>'; // verifica se la data è una data valida/reale