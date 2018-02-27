<?php

/*
Programming Exercises
1. Use the PHP require statement to include the contents of the file reusable.php in your current script.

2. Make a call to a PHP function named compute by passing in the variable 42.

3. Define a function named my_function that has no parameters and echos the string function called.

4. Write a function named table that accepts a parameter called data and echos the string table created.

5. Modify the following PHP function code to ensure that only the first echo statement is executed. Make your edit as compact as possible, using the blank underline as your guide.

   function test_return() {
     echo "This statement will be executed";{
     _____{
     echo "This statement will never be executed";{
   }
*/


// 1
require('reusable.php');
echo $string;
echo '<hr>';

// 2
$var = 42;
function compute($myvar){
  return $myvar;
}

echo compute($var);
echo '<hr>';

// 3
function my_function(){
  return "this is a string";
}
echo my_function();
echo '<hr>';

// 4
function table($data){
  $table = <<<TABLE
    <table border="1">
      <tr>
        <td>{$data}</td>
      </tr>
    </table>
TABLE;
  return $table;
}

echo table("this is a table row");
echo '<hr>';

// 5

function test_return() {
  return "This statement will be executed";
  echo "This statement will never be executed";
}

echo test_return();
echo '<hr>';