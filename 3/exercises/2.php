<?php

  //Which of the following PHP expressions can get the domain name from a customer's email address?
  $email = "galdiolo.nicola@gmail.com";

  echo print_r(explode('@', $email), '<br>');

  $email = array('galdiolo.nicola', 'gmail.com');
  echo join('@', $email);

?>

