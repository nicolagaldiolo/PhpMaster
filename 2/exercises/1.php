<?php
/*
Programming Exercises
1. You need to open the file orders.txt for writing. Modify the following code, specifically the two placeholders, to accomplish your goal.

     $fp = ___("$document_root/../orders/orders.txt", '___');

2. Use the PHP fwrite function to write the string stored in $outputstring to the file pointed to by $fp.

3. Use PHP to close the file $fp programmatically.

4. You need to use a PHP while loop to read from a file until the end of the file is reached. Modify the following code to accomplish your goal.

    while (!___($fp))

5. Use PHP to echo the size of the file orders.txt that's present in your current working directory.
*/

$document_root = $_SERVER['DOCUMENT_ROOT'];
$originFile = $document_root . '/2/orders/order.txt';
$orderFile = $document_root . '/2/exercises/order.txt';

if(!file_exists($orderFile)){
  copy($originFile, $orderFile);
}

if(file_exists($orderFile)){
  @$fp = fopen($orderFile, 'ab' );

  if(!$fp){
    echo 'Ho avuto problemi con l\'apertura del file';
  }
  flock($fp, LOCK_EX);
  $outputstring = "Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione." . PHP_EOL;
  fwrite ( $fp, $outputstring);
  flock($fp, LOCK_UN);
  fclose($fp);

  @$fp = fopen( $orderFile, 'rb' );
  if(!$fp){
    echo 'Ho avuto problemi con l\'apertura del file';
  }

  flock($fp, LOCK_SH);
  while(!feof($fp)) {
    $c = fgets($fp);
    echo $c . "<br />";
  }

  echo 'order.txt' . ': ' . filesize( $orderFile ) . ' bytes';

  flock($fp, LOCK_UN);
  fclose($fp);

}