<?php

function reverse_r($str){
  if (strlen($str)>0) {
    echo $str, '<br>';
    reverse_r(substr($str, 1));
  }
  echo substr($str, 0, 1);
  return;
}


function reverse_i($str){
  for($i=1; $i <= strlen($str); $i++){
    echo substr($str, -$i, 1);
  }
}

$str = "Michelangelo";

reverse_r($str);
echo "<hr>";
reverse_i($str);