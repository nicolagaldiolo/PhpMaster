<?php
    session_start();
    include 'define_lang.php';
    include 'lang_strings.php';
    defineStrings();

    // quando vengono inviate al client le info sulla lingua e sul charset da usare posso includerle nell'header della risposta, es:
    // header("Content-Type: text/html;charset=".CHARSET);
    // header("Content-Language: ".LANGCODE);
    // oppure posso aggiungerle come tag html, es: 
    /*
    //<html lang="<?php echo LANGCODE; ?>">
    //<meta charset="<?php echo CHARSET; ?>" />
    */
?>

<!DOCTYPE html>
<html lang="<?php echo LANGCODE; ?>">
    <head> 
        <meta charset="<?php echo CHARSET; ?>" />
    </head>
    <body>
        <h1><?php echo WELCOME_TXT; ?></h1>
        <h4><?php echo CHOOSE_TXT; ?></h4>
        <ul>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?lang=en">En</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?lang=ja">Ja</a></li>
        </ul>
    </body>
</html>