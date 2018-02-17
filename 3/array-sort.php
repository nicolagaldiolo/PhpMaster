<?php

/*
    sort() - sort arrays in ascending order
    rsort() - sort arrays in descending order
    asort() - sort associative arrays in ascending order, according to the value
    ksort() - sort associative arrays in ascending order, according to the key
    arsort() - sort associative arrays in descending order, according to the value
    krsort() - sort associative arrays in descending order, according to the key
 */


/*
 *  sort() - asort() - ksort() per ordinare gli array e array associativi (in maniera ascendente)
 */

$alphanumeric = array('a', 'z', 'b', 'W', 'A', 's', 1, 12, '2', '12', 'M');
sort($alphanumeric);
echo var_dump($alphanumeric);

sort($alphanumeric, SORT_NUMERIC);
echo var_dump($alphanumeric);


$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);

asort($prices); // uguale al sort solo che serve per ordinare gli array associativi (key=>value)
echo var_dump($prices);

ksort($prices); // uguale al sort solo che serve per ordinare gli array associativi in base alla chiave e non
// al proprio valore (key=>value)
echo var_dump($prices);



/*
 *  rsort() - arsort() - krsort() per ordinare gli array e array associativi (in maniera descendente)
 */

$alphanumeric = array('a', 'z', 'b', 'W', 'A', 's', 1, 12, '2', '12', 'M');
rsort($alphanumeric);
echo var_dump($alphanumeric);

rsort($alphanumeric, SORT_NUMERIC);
echo var_dump($alphanumeric);


$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);

arsort($prices); // uguale al sort solo che serve per ordinare gli array associativi (key=>value)
echo var_dump($prices);

krsort($prices); // uguale al sort solo che serve per ordinare gli array associativi in base alla chiave e non
// al proprio valore (key=>value)
echo var_dump($prices);


/*
 *  ORDINARE ARRAY MULTIDIMENSIONALI
 *
 *  FUNZIONE BUIL-IN array_multisort() per ordinare + array o array multidimensione (agisce sul primo elmento di ogni array)
 */

$products = array(
    array('TIR', 'Tires', 100),
    array('OIL', 'Oil', 10),
    array('SPK', 'Spark Plugs', 4)
);

array_multisort($products);

echo var_dump( $products );



/*
 *  ORDINARE ARRAY MULTIDIMENSIONALI
 *
 *  usort - User-Defined sort - ordinare un'array utilizzando una funzione propria di callback
 * (utile per ordinare secondo una propria logica)
 */

function compare($x, $y) {
    if ($x[1] == $y[1]) {
        return 0;
    } else if ($x[1] < $y[1]) {
        return -1;
    } else {
        return 1;
    }
}

function reverse_compare($x, $y) {
    if ($x[1] == $y[1]) {
        return 0;
    } else if ($x[1] < $y[1]) {
        return 1;
    } else {
        return -1;
    }
}

$products = array(
    array('TIR', 'Tires', 100),
    array('OIL', 'Oil', 10),
    array('SPK', 'Spark Plugs', 4)
);

// usort chiama la funzione di compare per ogni elemento dell'array e torna gli elementi ordinati (in questo caso il secondo elemento dell'array.
// (per ordinare sul primo elemento dell'array mi bastava la funzione buil-in array_multisort() )
usort($products, 'compare'); // ORDINE CRESCENTE
echo var_dump( $products );

usort($products, 'reverse_compare'); // ORDINE DECRESCENTE
echo var_dump( $products );


?>