<?php

echo '<hr>';
echo 'Get current user: <br/>';
echo get_current_user();

echo '<hr>';
echo 'Get last file modify: <br/>';
echo date('g:i a, j M Y',getlastmod());

//get_loaded_extensions - torna tutte le estensioni disponibili con la corrente installazione di php
//get_extension_funcs - torna tutte le funzioni disponibili data una determinata estensione.

echo '<hr>';

echo 'Check if "zlib" extension is installed: <br/>';
echo var_dump(in_array('zlib', get_loaded_extensions()));

echo '<hr>';

echo 'Check if "strtotime" function is available in "date" extension: <br/>';
$date_ext = get_extension_funcs('date');
echo var_dump(in_array('strtotime', $date_ext));

echo '<hr>';

echo 'Function sets supported in this install are: <br/>';
$extenstions = get_loaded_extensions();
foreach($extenstions as $ext){
    echo '<h2>' . $ext. '</h2>';
    echo '<ul>';
        $ext_func = get_extension_funcs($ext);
        if($ext_func){
            foreach($ext_func as $ext){
                echo '<li>' . $ext . '</li>';
            }
        }
    echo '</ul>';
}