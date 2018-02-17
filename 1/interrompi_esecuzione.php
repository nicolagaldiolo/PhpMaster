<?php

$arr = array('one', 'two', 'three', 'four', 'stop', 'five');

foreach ($arr as $val){
    if ($val == 'stop') {
        break;    // interrompe l'esecuzione del ciclo
    }
    echo $val . "\n";
}


$arr = array('one', 'two', 'three', 'four', 'five');

foreach ($arr as $val){
    if ($val == 'three') {
        continue;    // salta l'esecuzione di questa iterazione e va alla prossima iterazione
    }
    echo $val . "\n";
}



$arr = array('one', 'two', 'three', 'exit', 'five');

foreach ($arr as $val){
    if ($val == 'exit') {
        exit;    // interrompe l'esecuzione dell'intero script (non solo del ciclo)
    }
    echo $val . "\n";
}



echo '<pre>IO NON VENGO STAMPATO</pre>';