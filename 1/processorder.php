<html>
    <head>
        <title>Welcome to phpmaster.local</title>
    </head>
    <body>

        <h1>Bob's Auto Parts</h1>
        <p>Order processed at: <?php echo date('H:i, jS F Y'); ?></p>

        <?php

            // htmlspecialchars converte alcuni caratteri tipo & " ' < >
            // htmlentities Converte tutti i possibili caratteri in entità HTML
            $tires  = intval(htmlspecialchars($_POST['tireqty']));
            $oil    = intval(htmlspecialchars($_POST['oilqty']));
            $spark  = intval(htmlspecialchars($_POST['sparkqty']));

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



            ?>

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

    </body>
</html>