<?php

  session_start();
  
  if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
    header('Location: authmain.php');
  }
?>

<h1>Benvenuto <?php echo $_SESSION['user_name']; ?>
<h2>Benvenuto nella tua area personale</h2>
<ul>
  <li>
    <a href="logout.php">Logout</a>
  </li>
</ul>