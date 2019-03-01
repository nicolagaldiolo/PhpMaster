<?php

session_start();

// Error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline, $var){
    return false;
    echo "<p><strong>ERROR: " . $errstr . "</strong><br>
    Please try again, or contact us and tell us that the
    error occurred in line <strong>".$errline."</strong> of file <strong>".$errfile."</strong>
    so that we can investigate further.</p>";

    echo var_dump($var); // stato delle superglobal al momento dell'errore

    if(($errno == E_USER_ERROR) || ($errno == E_ERROR)) {
        echo "<p>Fatal Error. Program ending.</p>";
        exit;
    }

    echo "<hr/>";
}

// Set the error handler 
set_error_handler('myErrorHandler'); // registro la funzione per gestire l'errore sollevato dall'utente

// trigger different level of error
trigger_error("Trigger function colled.", E_USER_NOTICE);
fopen('nofile', 'r');
trigger_error("This computer is beige.", E_USER_WARNING);
include('nofile');

trigger_error("This computer will self destruct in 15 seconds.", E_USER_ERROR);