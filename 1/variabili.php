<?php $a = 56;
echo gettype($a), '<br />';
echo '<hr>'; settype($a, 'float');
echo gettype($a), '<br />';
echo '<hr>';

$tyreqty = 10;

echo 'isset($tyreqty): ' . isset($tyreqty) . '<br />';
echo 'isset($nothere): ' . isset($nothere) . '<br />';
echo 'empty($tyreqty): ' . empty($tyreqty) . '<br />';
echo 'empty($nothere): ' . empty($nothere) . '<br />';

echo '<hr>';

$nome0 = "Nicola";
$nome1 = "Andrea";
$nome2 = "Michele";
$nome3 = "Roberto";
$nome4 = "Antonio";

for($i=0; $i<5; $i++){
    $temp = "nome$i";
    echo $$temp . '<br/>';
}

// $temp è una stringa es: nome0, nome1, nome.....
// $$temp prende il valore della variabile $temp e la considera come il nome di una variabile.