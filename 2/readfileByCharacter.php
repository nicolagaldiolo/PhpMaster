<html>
<head>
    <title>Welcome to phpmaster.local</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
    <?php
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    @$fp = fopen("$document_root/2/orders/order.txt", 'rb');
    flock($fp, LOCK_SH);

    if(!$fp){
        echo "<p><strong>Your order could no be processed at this time. Please try again later. </strong></p></body></html>";
        exit;
    }

    while(!feof($fp)) { // feof si passa tutto il file e controlla se il puntatore è alla fine del file, continua il parsing finchè non è alla fine

        // per ragioni di perfomance è meglio usare fgets che legge riga per riga anzichè carattere per carattere
        // da usare solo quando serve

        $char = fgetc($fp);
        if(!feof($fp)){ // a differenza di fgets la funzione fgetc torna anche il carattere di EOF quindi devo evitarlo
            $char = ($char == "\n") ? "<br>" : $char;
            echo $char;
        }
    }

    // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
    flock($fp, LOCK_UN);
    fclose($fp);


    echo '<hr>';
    echo '<h2>fread() <small>per leggere solo un tot di caratteri</small></h2>';
    $fp = fopen("$document_root/2/orders/order.txt", 'rb');
    echo fread($fp, 200);
    ?>

</body>
</html>