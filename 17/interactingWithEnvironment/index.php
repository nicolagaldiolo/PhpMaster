<h2>getenv("VAR_NAME")</h2>
<p>Mi restituisce l'elenco delle variabili d'ambiente che troviamo con phpinfo().</p>
<p>Es: getenv("HTTP_REFERER") Variabile d'ambiente che mi da il referer, ossia da quale link è arrivato l'utente :
    <?php echo getenv("HTTP_REFERER"); ?></p>


<?php
// Example use of getenv()
$ip = getenv('REMOTE_ADDR');

// Or simply use a Superglobal ($_SERVER or $_ENV)
$ip = $_SERVER['REMOTE_ADDR'];

// Safely get the value of an environment variable, ignoring whether
// or not it was set by a SAPI or has been changed with putenv
$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR')
?>