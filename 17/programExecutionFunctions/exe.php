<?php

$result;
$return_value;

echo exec("ls -la", $result, $return_value);

// senza parmetri output e return_var torna l'ultima riga del risultato del comando

echo var_dump($result); // viene tornata un array di stringhe contenente ogni riga del risultato del comando
echo var_dump($return_value); // viene tornato il codice del risultato del comando