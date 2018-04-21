<!DOCTYPE html>
<html>
<head>
    <title>What be ye laddie?</title>
</head>
<body>

<?php

$input_str = "<p align=\"center\" style=\"background: red;\">The user gave us \"15000?\".</p>
              <script type=\"text/javascript\">
              // malicious JavaScript code goes here.
              </script>";

// htmlspecialchars e htmlentities fanno sostanzialmente la medesima cosa solo che la prima
// si preoccupa solo dei caratteri speciali, quelli "pericolosi", es: <,>,/, mentre l'altra
// converte ogni cosa riconducibile a html.

$str = htmlspecialchars($input_str, ENT_NOQUOTES, "UTF-8");
echo nl2br($str);

$str = htmlentities($input_str, ENT_QUOTES, "UTF-8");
echo nl2br($str);

?>

</body>
</html>