<?php

// ELENCO TIMEZONES: http://php.net/manual/en/timezones.php

//GESTIONE DATE PHP E MYSQL | GESTIRE CALENDARI PHP
//http://php.net/manual/en/book.datetime.php
//https://dev.mysql.com/doc/refman/5.6/en/date-and-time-functions.html
//http://php.net/manual/en/book.calendar.php

// Tutte le funzioni per gestire la date leggono iL parametro date.timezone settato nel file php.ini
// di default date.timezone non è settato quindi viene letto Default timezone che è settato a UTC (= Coordinated Universal Time )
// ossia il fuso orario di riferimento (Greenwich) da cui vengono calcolati tutti gli altri

// è possibile forzare il fuso orario anche nello script con la funzione: 
//date_default_timezone_set('America/Los_Angeles');
//date_default_timezone_set('UTC');

echo '<hr>';

/* 
// FUNZIONI PER LAVORARE CON LE DATE | NON GESTISCONO LOCALE | date(), mktime(), time(), microtime(), getdate(), checkdate(), strtotime()
// FUNZIONI PER STAMPARE LE DATE | GESTISCONO IL LOCALE | strftime()
// LAVORARE CON LE DATE IN MYSQL | DATE_FORMAT() | UNIX_TIMESTAMP()
*/

// date() | Torna una data formattata, puoi passare come secondo parametro un timestamp specifico altrimenti calcola now
echo 'date (NON gestisce la localizzazione): ', date("F j, Y, g:i a e L I"), '<br>';    // March 10, 2001, 5:16 pm (NON GESTISCE LOCALE)

//mktime() | calcola il timestamp 
echo 'mktime: ', mktime(), '<br>';                          // 556495200 | mktime() senza parametri potrebbe tornare un E_STRICT notice, meglio usare time()
echo 'time: ', time(), '<br>';                              // 556495200 | torna il current timestamp, è la stessa cosa di usare mktime() solo che mktime() senza parametri potrebbe tornare un E_STRICT notice
echo 'date(U): ', date("U"), '<br>';                        // 556495200
echo 'mktime: ', mktime(0, 0, 0, 8, 21, 1987), '<br>';      // 556495200
echo 'mktime: ', mktime(12, 0, 0), '<br>';                  // torna il timestamp delle ore 12 del giorno corrente
echo 'mktime: ', mktime(0, 0, 0, 1,1), '<br>';              // torna il timestamp del 1° Gennaio dell'anno corrente
// Timestamp con calcoli aritmentici
echo 'mktime: ', mktime(0, 0, 0, 1,(15 + 30),2019), '<br>'; // torna il timestamp del 15 Gennaio 2019 + 30 giorni
echo 'mktime: ', mktime(0, 0, 0, 2,14,2019), '<br>';        // torna il timestamp del 14 Febbraio 2019 (equivalente a quello sopra)

$time = mktime(12, 10, 0, 8,45); // passando 12 sulle ore toglie alcuni problemi di calcolo dovuti all'ora legale
echo 'mktime Agosto (anno corrente) + 45days: ', date("F j, Y, g:i a e", $time), '<br>';

// getdate() | torna un array chiave=>valore con data, ora e timestamp. Accetta un custom timestamp come parametro
echo '<pre>', var_dump(getdate()), '</pre>';

// checkdate() | Verifica se la data è una data valida/reale
echo 'checkdate: ', var_dump(checkdate(2,30, 2018)), '<br>';

// strtotime() | Parse about any English textual datetime description into a Unix timestamp
echo 'strtotime: ', strtotime("11.12.10"), '<br>';  // 1543671322
echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";

// microtime()
echo 'microtime: ' , var_dump(microtime()) , '</br>'; //0.71353900 1549119668 | torna una stringa dove il primo blocco è il parziale di secondo trascorso mentre il 2 blocco è lo unixtimestamp
echo 'microtime(true): ' , var_dump(microtime(true)) , '</br>'; //1549119668.7136 | torna un float che comprende il timestamp + il parziale di secondo trascorso
echo 'microtime(true): ' , number_format(microtime(true), 6, '.', '') , '</br>'; //1549119668.7136 | torna un float che comprende il timestamp + il parziale di secondo trascorso

// strftime | Torna una data formattata prendendo in considerazione il setLocale, puoi passare come secondo parametro un timestamp specifico altrimenti calcola now
echo 'strftime (GESTISCE la localizzazione): ', strftime('%A | %x | %c | %Y'), '<br>';      // Saturday | 02/02/19 | Sat Feb 2 12:40:43 2019 | 2019
setlocale(LC_TIME, 'it_IT');
echo 'strftime (GESTISCE la localizzazione): ', strftime('%A | %x | %c | %Y'), '<br>';      // Sabato | 02.02.2019 | Sab 2 Feb 12:40:43 2019 | 2019

// MYSQL
// MySql gestisce le date in formato ISO YYYY-MM-DD quindi quando salvo la la data sul db o la estraggo la devo convertire

// DATE_FORMAT() | Estrae la data formattandola nel formato che vogliamo
// SELECT DATE_FORMAT(date_colum, '%m $d %Y') FROM tablename;

// UNIX_TIMESTAMP() | Estrae la data tornando un timestamp
// SELECT UNIX_TIMESTAMP(date_colum) FROM tablename;

// Per convertire una data dal calendario gregoriano a quello giuliano
$jd = gregoriantojd(12,31,2018);
echo jdtojulian($jd);