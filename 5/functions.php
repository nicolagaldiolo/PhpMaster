<?php

function greater($x=null, $y=null){
  if(!isset($x) || !isset($y) ){
    return false;
  }
  return ($x > $y) ? $x : $y;
}

function var_args(){
  echo "Number of params (func_num_args): " . func_num_args(), '<br>';
  echo "Lista dei prarametri (func_get_args): " . print_r(func_get_args()), '<br>';
  echo "Torna un parametro in particolare (func_get_arg): " . var_dump(func_get_arg(2));
}

function print_table($data, $header=NULL, $caption=NULL){
  if(!empty($data)){
    
    if($header){
      $header = "<h1>{$header}</h1>";
    }

    if($caption){
      $caption = "<caption>{$caption}</caption>";
    }
    
    $row = '';
    foreach($data as $item){
      $row .= "<tr><td>{$item}</td></tr>";
    }

    $table = <<<TABLE
      <table border="1" width="100%">
        {$header}
        {$caption}
        <tbody>
          {$row}
        </tbody>
      </table>
TABLE;
    return $table;
  }else{
    return false;
  }
}