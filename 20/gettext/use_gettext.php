<?php

session_start();
if(!isset($_SESSION['lang']) || !isset($_GET['lang'])){
   $_SESSION['lang'] = 'en';
}else{
   $_SESSION['lang'] = $_GET['lang'];
}

switch ($_SESSION['lang']) {
   case 'ja_JP':
       define('CHARSET', 'UTF-8');    
       define('LANGCODE', 'ja-JP');
       break;
   case 'en_US':
   default:
       define('CHARSET', 'ISO-8859-1');    
       define('LANGCODE', 'en-US');
       break;
}

$locale=$_SESSION['lang'];

putenv("LC_ALL=".$locale);
setlocale(LC_ALL, $locale);

$domain='messages';
bindtextdomain($domain, "./locale");
textdomain($domain);
?>
<!DOCTYPE html>
<html lang="<?php echo LANGCODE; ?>">
    <head> 
        <meta charset="<?php echo CHARSET; ?>" />
        <title><?php echo gettext("WELCOME_TEXT"); ?></title>
    </head>
<body>
   <h1><?php echo gettext("WELCOME_TEXT"); ?></h1>
   <h2><?php echo gettext("CHOOSE_LANGUAGE"); ?></h2>
   <ul>
      <li><a href="<?php echo $_SERVER['PHP_SELF']."?lang=en_US";?>">en_US</a></li>
      <li><a href="<?php echo $_SERVER['PHP_SELF']."?lang=ja_JP";?>">ja_JP</a></li>
   </ul>
</body>
</html>