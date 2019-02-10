<?php

session_start();

if(isset($_SESSION['session_var'])){
    echo 'The content of $_SESSION[\'session_var\'] is ' . $_SESSION['session_var'] . '<br />';
}else{
    echo '$_SESSION[\'session_var\'] non esiste<br />';
}

session_destroy();

?>



<a href="page3.php">Next Page</a>

