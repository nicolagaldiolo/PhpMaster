<?php

$count = 10000;

$dir = '/';

$startRead = microtime(true);
for ($i=0;$i<$count;$i++) {
  $handle = opendir($dir);
  while (false !== ($entry = readdir($handle))) {
    // We do not know what to do
  }
}
$endRead = microtime(true);

$startScan = microtime(true);
for ($i=0;$i<$count;$i++) {
  $array = scandir($dir);
}
$endScan = microtime(true);

echo "readdir: " . ($endRead-$startRead) . "\n";
echo "scandir: " . ($endScan-$startScan) . "\n";
  

?>