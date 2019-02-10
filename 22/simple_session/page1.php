<?php

session_start();

$_SESSION['session_var'] = 'Hello World';

if(isset($_SESSION['session_var'])){
    echo 'The content of $_SESSION[\'session_var\'] is ' . $_SESSION['session_var'] . '<br />';
}else{
    echo '$_SESSION[\'session_var\'] non esiste<br />';
}

?>

<a href="page2.php">Next Page</a>

