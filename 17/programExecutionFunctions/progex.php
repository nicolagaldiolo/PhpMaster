<?php

chdir('/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17'); // cambio la directory corrente settando quella su cui lavorare

// EXEC VERSION


echo '<h1>Using exec()</h1>';
echo '<pre>';

// unix
//echo exec('ls -la'); stampa l'ultima riga del risultato del comando
exec('ls -la', $result); // passando la variabile $result immagazzina il risultato sottoforma di array in quella variabile

// window
//exec('dir', $result);

foreach ($result as $line){
    echo $line.PHP_EOL;
}

echo '</pre>';
echo '<hr />';


// PASSTHRU VERSION

echo '<h1>Using passthru()</h1>';
echo '<pre>';

// unix
passthru('ls -la'); // stampa direttamente l'output nel browser

// window
//passthru('dir');

echo '</pre>';
echo '<hr />';


// SYSTEM VERSION

echo '<h1>Using system()</h1>';
echo '<pre>';

// unix
$result = system('ls -la'); // stampa direttamente l'output nel browser

// window
//$result = system('dir');

echo '</pre>';
echo '<hr />';


// BACKTICK VERSION

echo '<h1>Using backticks()</h1>';
echo '<pre>';

// unix
echo `ls -la`; //sono operatori di esecuzione e si comportano come se fossimo in una shell, non emettono output, infatti lo devo stampare se lo voglio vedere

// window
//echo `dir`;


echo '</pre>';
