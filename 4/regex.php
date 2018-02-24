<?php

// Principali funzioni per lavorare con le regex:
// preg_match() TROVA substring con espressioni regolari || http://php.net/manual/it/function.preg-match.php
// preg_replace() SOSTITUISCE substring con espressioni regolari || http://php.net/manual/it/function.preg-replace.php
// preg_split() SPLITTA substring in altre substring con espressioni regolari || http://php.net/manual/it/function.preg-split.php

/*
* preg_match()
*/

$email = "galdiolo.nicola@gmail.com";

if (preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email, $match) === 0) {
  echo "<p>That is not a valid email address.</p>". "<p>Please return to the previous page and try again.</p>";
  exit;
}else{
  echo "<p>Match avvenuto:" . var_dump($match) . "</p>";
}

$feedback = "Lorem Ipsum è un testo segnaposto customer service utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo";

if (preg_match('/shop|customer service|retail/', $feedback, $match, PREG_OFFSET_CAPTURE)) { 
  // PREG_OFFSET_CAPTURE mi modifica l'array aggiungendo anche la posizione della stringa trovata
  echo "<p>Match avvenuto:" . var_dump($match) . "</p>";
}

/*
* preg_replace()
*/

$string = "Lorem Ipsum è un testo segnaposto customer service utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo";
$pattern = "/(Lorem Ipsum)+/";
$replacement = "Nicola Galdiolo";
echo preg_replace($pattern, $replacement, $string);

echo '<br>';

$string = "April 15, 2004";
$pattern = "/(\w+) (\d+), (\d+)/i";
$replacement = "\$1 1, \$3"; // identifico per riferimento
echo preg_replace($pattern, $replacement, $string);

echo '<br>';
// posso passare anche un array
$string = "The quick brown fox jumped over the lazy dog.";

$patterns[0] = "/quick/";
$patterns[1] = "/brown/";
$patterns[2] = "/fox/";

$replacements[2] = "bear";
$replacements[1] = "black";
$replacements[0] = "slow";

echo preg_replace($patterns, $replacements, $string);
echo '<br>';

/*
* preg_split()
*/

// -1 con il parametro limit dico quanto risultati voglio al massimo (-1 default = tutti)
// con i flag do alcune specifiche:
  // PREG_SPLIT_NO_EMPTY: solo occorrenze senza spazi
  // PREG_SPLIT_OFFSET_CAPTURE: mi aggiunge all'array informazioni in merito alla posizione dell'occorrenza
  // PREG_SPLIT_DELIM_CAPTURE: Se questo flag è impostato, l'espressione tra parentesi nel pattern del delimitatore verrà catturata e restituita.

$result = preg_split('/\.|@/', 'galdiolo.nicola@gmail.com', -1, PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_DELIM_CAPTURE);
echo '<pre>', print_r($result), '</pre>';

