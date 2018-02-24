<?php
  /*
  Programming Exercises
  1. Edit the following code to specify that $total is a floating point number with two decimal places after the decimal point.

        printf ("Total amount of order is ___", $total);

  2. Convert the $subject string to lowercase.

  3. Edit the following PHP code to split the customer's e-mail address into two parts.

        $email_array = explode('@', $email);

  4. Edit the following PHP code to echo the value 4 to the browser.

        $test = "Hello world";
        echo strpos($test, "___");

  5. Write a PCRE regular expression that matches http:// using http as a literal.
  */

  // 1
  $total = 12.4;
  $var = sprintf("Total amount of order is %.2f", $total);
  echo $var;

  echo '<hr>';

  // 2
  $string = "If the input string passed to this function and the final document share the same character set";
  echo strtoupper($string);

  echo '<hr>';

  // 3
  $email = "galdiolo.nicola@gmail.com";
  $email_array = explode('@', $email);
  print_r($email_array);
  echo '<hr>';

  // 4
  $test = "Hello world";
  echo strpos($test, "o");
  echo '<hr>';

  // 5
  $string = "https://mailtrap.io/";
  
  preg_match('/^[a-z]+[:|\/]+/', $string, $matches);
  print_r($matches);

?>




