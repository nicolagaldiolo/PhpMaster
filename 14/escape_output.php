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

//$str = $input_str;
$str = htmlspecialchars($input_str);
echo nl2br($str);

?>

</body>
</html>