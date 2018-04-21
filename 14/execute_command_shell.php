<?php

// due modi per eseguire comandi da terminale

$file = `grep -i 045 phonenums.txt`; // Utilizzando i gli apici storti ``
$file = shell_exec("grep -i 045 phonenums.txt"); // oppure attraverso la funzione shell_exec()

// Le funzioni exec e system sono simili all'operatore delle virgolette di esecuzione,
// tranne per il fatto che eseguono direttamente il comando anziché eseguirlo all'interno
// di un ambiente shell e non restituiscono sempre l'intero set di output restituito dalle
// virgolette di esecuzione. Condividono molti degli stessi problemi di sicurezza, e
// quindi vengono anche con gli stessi avvertimenti.

$number = explode("\n", $file);

echo var_dump($number);

?>