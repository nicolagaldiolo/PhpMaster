<?php

// Reflection è un API messa a disposizione da php per interrogare una classe e farsi tornare la
// sua intera struttura. Utile se si ha bisogno di vedere classi sviluppate da altri o non documentate

require_once("objDemoSite/classes/page.php");

$class = new ReflectionClass("Page");

echo "<pre>" . $class . "</pre>";