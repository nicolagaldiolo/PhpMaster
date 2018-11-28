<?php

$string = "Ciao, mi chiamo nicola e vengo da Verona 's";

var_dump($string);

$string_encoded = urlencode($string);

var_dump($string_encoded);

$string_decoded = urldecode($string_encoded);

var_dump($string_decoded);

