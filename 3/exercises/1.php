<?php
/*
Programming Exercises
1. Create an array (using full PHP syntax) named $products that contains the values gum, spam, and eggs.

2. Create a PHP array called $numbers with elements ranging from 1 to 10.

3. Replace the first element of the $products array with Fuses.

4. Given the following $products definition, perform an ascending alphabetical sort on its contents.

    $products = array('Tires', 'Oil', 'Spark Plugs');

5. Edit the following code to accomplish the goal of reversing the array created by range().

    $numbers = range(1,10);
    $numbers = ___($numbers);

*/

$products = array("Gun", "Spam", "Eggs");
echo print_r($products);

$numbers = range(1,10);
echo print_r($numbers);

$products[0] = "Fuses";
echo print_r($products);

// sort - ordine per valore (da usare per array semplici valore)
$products_new = array('Tires', 'Oil', 'Spark Plugs');
if( sort($products_new) ){
  echo print_r($products_new);
}

// asort - ordine per valore (da usare per array con chiave valore)
$products_new2 = array( 'Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
if( asort($products_new2) ){
  echo print_r($products_new2);
}

// ksort - ordine per chiave (da usare per array con chiave valore)
$products_new3 = array( 'Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
if( ksort($products_new3) ){ 
  echo print_r($products_new3);
}

$numbers = range(1,10);
rsort($numbers);
print_r($numbers);