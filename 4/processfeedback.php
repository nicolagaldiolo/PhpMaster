<?php
  $name         = trim($_POST['name']);
  $email        = trim($_POST['email']);
  $feedback     = trim($_POST['feedback']);

  $toaddress    = 'galdiolo.nicola@gmail.com';
  $subject      = "Feedback from web site";
  $mailcontent  = "Customer Name: " .str_replace("\r\n", "", $name)."\n".
                  "Customer Email: " .str_replace("\r\n", "", $email)."\n".
                  "Customer comments:\n" .str_replace("\r\n", "", $feedback)."\n";
  $fromaddress  = "From: webmaster@example.com";

  mail ($toaddress, $subject, $mailcontent, $fromaddress);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Feedback Submitted</title>
  </head>
  <body>
    <h1>Feedback submitted</h1>
    <p>Your Feedback has been sent.</p>
    <p><?php echo nl2br(htmlspecialchars($feedback)); ?></p>
  </body>
</html>