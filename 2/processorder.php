<html>
    <head>
        <title>Welcome to phpmaster.local</title>
    </head>
    <body>
        <?php
            if($_POST){
                // htmlspecialchars converte alcuni caratteri tipo & " ' < >
                // htmlentities Converte tutti i possibili caratteri in entità HTML
                $tires  = intval(htmlspecialchars($_POST['tireqty']));
                $oil    = intval(htmlspecialchars($_POST['oilqty']));
                $spark  = intval(htmlspecialchars($_POST['sparkqty']));
                $address  = preg_replace('/\t|\r/',' ', $_POST['address']);
                $date = date('H:i, jS F Y');

                $subtotal = $subtotalTax = 0.00;
                $totalqty = $tires + $oil + $spark;

                if($totalqty > 0) {

                    define('TIRES', 100);
                    define('OILPRICE', 10);
                    define('SPARKPRICE', 4);
                    define('TAX', 0.10);

                    switch ($totalqty) {
                        case ($totalqty >= 10 && $totalqty <= 49):
                            $discount = 5;
                            break;
                        case ($totalqty >= 50 && $totalqty <= 99):
                            $discount = 10;
                            break;
                        case ($totalqty > 100):
                            $discount = 15;
                            break;
                        default:
                            $discount = 0;
                    }

                    $subtotal = ($tires * TIRES) + ($oil * OILPRICE) + ($spark * SPARKPRICE);

                    if($discount > 0){
                        $discount_perc = $discount;
                        $discount_value = ($discount / 100) * $subtotal;
                        $price_not_discount = $subtotal;
                        $subtotal -= $discount_value;
                    }


                    $subtotalTax = $subtotal * (1 + TAX);

                    // apro la connessione al file, se non c'è lo creo
                    $document_root = $_SERVER['DOCUMENT_ROOT'];
                    @$fp = fopen("$document_root/2/orders/order.txt", 'ab');
                    if(!$fp){
                        echo "<p><strong>Your order could no be processed at this time. Please try again later. </strong></p></body></html>";
                        exit;
                    }

                    $outputstring = $date . "\t" . $tires . " tires \t" .  $oil . " oil \t" . $spark . " spark plugs\t€" . $subtotalTax . "\t" . $address . "\n";

                    // Sistema di bloccaggio file (Per acquisire una chiave esclusiva (in scrittura))
                    flock($fp, LOCK_EX);

                    // Scrivo nel file passando la lunghezza della stringa che andrò a scrivere
                    fwrite( $fp, $outputstring, strlen($outputstring));

                    // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
                    flock($fp, LOCK_UN);

                    // chiudo la connessione al file
                    fclose($fp);

                ?>

                    <h1>Bob's Auto Parts</h1>
                    <p>Order processed at: <?php echo $date; ?></p>
                    <p>Your order is as follow:</p>
                    <?php

                        if($tires > 0) {
                            echo $tires . ' tires<br>';
                        }
                        if($oil > 0){
                            echo $oil .' bottle of oil<br>';
                        }
                        if($spark > 0) {
                            echo $spark . 'park plugs<br>';
                        }

                    ?>

                    <p>
                        Items ordered: <?php echo $totalqty; ?><br>
                        <?php
                            if($discount > 0){
                                echo 'Discount: ' . $discount_perc . '%<br>';
                                echo 'Discount value: ' . number_format($discount_value, 2, '.', '') . '<br>';
                                echo 'Prezzo pieno: ' . number_format($price_not_discount, 2, '.', '') . '<br>';
                            }
                        ?>
                        <span style="color: red;">
                            Subtotal: <?php echo number_format($subtotal, 2, '.', ''); ?><br>
                            Total including tax: <?php echo number_format($subtotalTax, 2, '.', ''); ?>
                        </span>
                    </p>

                <?php }else{ ?>
                    <p style="color:red;">You did not order Anything.</p>

                <?php } ?>
            <?php } ?>
    </body>
</html>