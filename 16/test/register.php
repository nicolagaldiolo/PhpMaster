<!DOCTYPE html>
<html>
<head>
    <title>Secret Page</title>
</head>
<body>

<h1>Register</h1>

    <?php
    if(isset($_POST['name']) || isset($_POST['password'])) {

        $user = $_POST['name'];
        $password = $_POST['password'];

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // apro la connessione al file, se non c'è lo creo
        $document_root = $_SERVER['DOCUMENT_ROOT'];

        try {
            @$fp = fopen("$document_root/16/test/password_file.txt", 'ab');
            if (!$fp) {
                throw new Exception('Non è stato possibile creare il tuo account per favore prova più tardi.');
            }

            $authentication = json_encode(array('name' => $user, 'password' => $password_hash))."\n";

            // Sistema di bloccaggio file (Per acquisire una chiave esclusiva (in scrittura))
            flock($fp, LOCK_EX);

            // Scrivo nel file passando la lunghezza della stringa che andrò a scrivere
            fwrite($fp, $authentication, strlen($authentication));

            // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
            flock($fp, LOCK_UN);

            // chiudo la connessione al file
            fclose($fp);

            $html = '<h1>Account creato con successo</h1><br>';
            $html .= '<a href="login.php">Login</a>';

        }catch (Exception $e){
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }



        // visitor needs to enter a name and password
    }else {
        $html = <<<HTML
        <form method="post" action="">
            <p><label for="name">Username:</label>
                <input type="text" name="name" id="name" size="15" /></p>
            <p><label for="password">Password:</label>
                <input type="password" name="password" id="password" size="15" /></p>
            <button type="submit" name="submit">Register</button>
        </form>
HTML;
    }

    echo $html;

    ?>

</body>
</html>