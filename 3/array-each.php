<?php

$prices = array(
    'Tires' => 100,
    'Oil' => 10,
    'Spark Plugs' => 4
);

foreach ($prices as $key => $value){
    echo $key . " - " . $value . "<br>";
}

echo '<hr>';

while($element = each($prices)){
//    echo '<pre>', print_r($element), '</pre>';
    echo $element['key'] . " - " . $element['value'] . "<br>";
}

echo '<hr>';

reset($prices); // usando each() viene girato tutto l'array fino a quando il puntatore è arrivato in fondo all'array
// ma se qualcuno ha già effettuato questa operazione in precendeza il puntatore si trova già in fondo quindi occorre resettarlo.
while(list($product, $price) = each($prices)){
    echo "Product: " . $product . " - Price: " . $price . "<br>";
}

