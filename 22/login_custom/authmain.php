<?php
  
  session_start();
  
  $error = "";

  if(isset($_POST) && !empty($_POST)){
    $username = addslashes(strip_tags($_POST['username']));
    $password = sha1(addslashes(strip_tags($_POST['password'])));
    
    $db = new mysqli("localhost", "root", "", "user");
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        exit;
    }

    $stmt = $db->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result(); // salva in memoria tutto il resultset
    $stmt->bind_result($id, $username);
    
    if($stmt->fetch()){
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $username;
    }else{
      $error = "Credenziali non corrispondenti ai dati registrati.";
    }
  };

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])): ?>
        <h1>Benvenuto <?php echo $_SESSION['user_name']; ?></h1>
        <ul>
          <li>
            <a href="members_only.php">Area riservata</a>
          </li>
          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      <?php else: ?>
        <?php if(!empty($error)) : ?>
          <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif ?>
        <h1>Login</h1>
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      <?php endif ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </body>
</html>