<?php

$transport = array('foot', 'bike', 'car', 'plane');

// i metodi di seguito spostano il puntatore dell'array

$mode = current($transport);        // $mode = 'foot';
$mode = next($transport);    // $mode = 'bike';
$mode = current($transport);        // $mode = 'bike';
$mode = prev($transport);    // $mode = 'foot';
$mode = end($transport);     // $mode = 'plane';
$mode = current($transport);        // $mode = 'plane';

$arr = array();
var_dump(current($arr));            // bool(false)

$arr = array(array());
var_dump(current($arr));            // array(0) { }

echo '<hr>';
$value = end($transport); // porto il puntatore della'array alla fine dell'array e lo assegno ad una variabile

while ($value){ // finchè il puntatore punta ad un elemento esistente dell'array e quindi non torna false
    echo $value . "<br>"; // stampo il valore attuale
    $value = prev($transport); // sposto il puntatore di $transport indietro di una posizione e lo assegno a value
}

echo '<hr>';

/*
 * Array Walk
 */

$myarr = [1,2,3,4,4,5,6,7,8,9];
function moltiply_value(&$item, $key, $factor){ // $item viene passato con davanti il simbolo & questo significa che la variabile $item viene passata per referenza e quindi $item è esattamente l'elemento dell'array e
// non un riferimento, quindi se modifico la variable modifico l'array vero e proprio.
    $item *= $factor;
}
array_walk($myarr, 'moltiply_value', 3); // scorro un array e per ogni elemento dell'array passo una funzione di callback

echo var_dump($myarr);


echo '<hr>';

/*
 * Array Count, sizeof & array_count_value()
 *
 * // count e sizeof tornato il numero di elemento di cui è composto l'array
 */

//array_count_value torna un array contentente tutti i valori unici come chiave e il numero di volte che i valori sono ripetuti nell'array come valore

$array = array(1, "hello", 1, "world", "hello");
$ac = array_count_values($array);
print_r($ac); // Array ( [1] => 2 [hello] => 2 [world] => 1 )


echo '<hr>';

/*
 * Array extract
 *
 * // dato un array composto da chiave valore col metodo extract estraggo e assegno tutti gli elementi dell'array a delle variabili che prendono il nome delle chiavi.
 */

$array_extract = array(
    'key1' => 'Value1',
    'key2' => 'Value2',
    'key3' => 'Value3',
    'key4' => 'Value4',
);

extract($array_extract, EXTR_OVERWRITE); // DEFAULT If there is a collision, overwrite the existing variable.

echo "$key1 $key2 $key3";

// potrebbe essere che le variabili siano già definite nello scope quindi posso aggiungere un prefisso da passare come attributo alla funzione extract

$array_extract2 = array(
    'key1' => 'Value1',
    'key2' => 'Value2',
    'key3' => 'Value3',
    'key4' => 'Value4',
);

extract($array_extract2, EXTR_PREFIX_ALL, "pippo");

echo "$pippo_key1 $pippo_key2 $pippo_key3";

?>