<?php

function defineStrings(){
    $lang = $_SESSION['lang'];

    switch ($lang) {
        case 'ja':
            define('WELCOME_TXT', 'ベンヴェヌート');
            define('CHOOSE_TXT', '言語を変えてください');
            break;
        case 'en':
        default:
            define('WELCOME_TXT', 'Welcome');
            define('CHOOSE_TXT', 'Change language');
            break;
    }

}

?>