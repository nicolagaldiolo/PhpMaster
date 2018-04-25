<?php

function server_basic_auth(){
    if ((!isset($_SERVER['PHP_AUTH_USER'])) && (!isset($_SERVER['PHP_AUTH_PW'])) && (substr($_SERVER['HTTP_AUTHORIZATION'], 0, 6) == 'Basic ')) {
        list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
    }

    // Replace this if statement with a database query or similar
    if (($_SERVER['PHP_AUTH_USER'] != 'user') || ($_SERVER['PHP_AUTH_PW'] != 'pass')) {

        // visitor has not yet given details, or their
        // name and password combination are not correct

        header('WWW-Authenticate: Basic realm="Realm-Name"');
        header('HTTP/1.0 401 Unauthorized');
    } else {
        return true;
    }
}

function logout(){
    if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))) {
        list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = array('','');
    }
}

if(isset($_GET['logout'])){
    logout();
}

?>