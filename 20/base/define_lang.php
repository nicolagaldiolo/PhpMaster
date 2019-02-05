<?php

if(!isset($_SESSION['lang']) || !isset($_GET['lang'])){
    $_SESSION['lang'] = 'en';
}else{
    $_SESSION['lang'] = $_GET['lang'];
}

switch ($_SESSION['lang']) {
    case 'ja':
        define('CHARSET', 'UTF-8');    
        define('LANGCODE', 'ja');
        break;
    case 'en':
    default:
        define('CHARSET', 'ISO-8859-1');    
        define('LANGCODE', 'en');
        break;
}

// quando vengono inviate al client le info sulla lingua e sul charset da usare posso includerle nell'header della risposta, es:
// header("Content-Type: text/html;charset=".CHARSET);
// header("Content-Language: ".LANGCODE);
// oppure posso aggiungerle come tag html, es: 
/*
//<html lang="<?php echo LANGCODE; ?>">
//<meta charset="<?php echo CHARSET; ?>" />
*/

header("Content-Type: text/html;charset=".CHARSET);
header("Content-Language: ".LANGCODE);


?>