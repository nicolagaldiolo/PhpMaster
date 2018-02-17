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
                $c = fgets($fp);
                // funzione che si gira riga per riga fino a quando non trova un interruzione di riga \n o EOF end of file.
                // funzioni simili:
                // fgetss() - Simile a fgets() a differenza del fatto che elimina qualsiasi tag html o php. Puoi cmq permettere alcuni tag inserendoli nel parametro $allowable_tags
                // fgetcsv() - Simile a fgets() a differenza che posso impostato un delimitatore ed il tab \t come nel nostro caso e mi torna un array. è una sorta di explode() | utile se voglio ricostruire le variabili presenti in ogni riga
                echo $c . "<br />";
            }

            // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
            flock($fp, LOCK_UN);
            fclose($fp);

            ?>

    </body>
</html>