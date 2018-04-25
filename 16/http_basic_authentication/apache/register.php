<?php
  $message = "";
  if(isset($_POST['user'])
    && !empty($_POST['user'])
    && isset($_POST['password'])
    && !empty($_POST['password'])
    && isset($_POST['password-repeat'])
    && !empty($_POST['password-repeat'])
  ){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
  
    if($password === $password_repeat){
      $command = `htpasswd -b /Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16/http_basic_authentication/apache/.htpass {$username} {$password}`;
      $message = "Account creato con succusso";
    }else{
      $message = "Le passoword devono essere identiche";
    }
  }else{
    $message = "Tutti i campi sono obbligatori";
  }
  
  
  
  echo $message;
  
  
?>

<form method="post">
  <input type="text" name="user" placeholder="Username"><br>
  <input type="password" name="password" placeholder="Password"><br>
  <input type="password" name="password-repeat" placeholder="Repeat password"><br>
  <button type="submit">Submit</button>
</form>
