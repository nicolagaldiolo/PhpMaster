<!DOCTYPE html>
<html>
<head>
    <title>Secret Page</title>
</head>
<body>

<?php
if(isset($_POST['name']) || isset($_POST['password'])) {

    $user = $_POST['name'];
    $password = $_POST['password'];


    //$password_verify = password_verify($password, PASSWORD_BCRYPT);

    // apro la connessione al file, se non c'è lo creo
    $document_root = $_SERVER['DOCUMENT_ROOT'];

    try {
        @$fp = fopen("$document_root/16/session_upload_progress/password_file.txt", 'rb');
        flock($fp, LOCK_SH);

        if (!$fp) {
            throw new Exception('Non è stato possibile creare il tuo account per favore prova più tardi.');
        }

        while(!feof($fp)) {
            $c = fgets($fp);
            $data = json_decode($c, true);

            if($user == $data['name'] && password_verify($password, $data['password'])){
                $html = "<h1>Sei loggato</h1>";
                break;
            }
        }


        // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
        flock($fp, LOCK_UN);
        fclose($fp);

    }catch (Exception $e){
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }



    // visitor needs to enter a name and password
}else {
    $html = <<<HTML
        <h1>Login</h1>
        <form method="post" action="">
            <p><label for="name">Username:</label>
                <input type="text" name="name" id="name" size="15" /></p>
            <p><label for="password">Password:</label>
                <input type="password" name="password" id="password" size="15" /></p>
            <button type="submit" name="submit">Log In</button>
        </form>
HTML;
}

echo $html;

?>

</body>
</html>