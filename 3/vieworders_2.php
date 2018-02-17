<html>
    <head>
        <title>Welcome to phpmaster.local</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Customer Orders</h2>
        <?php
            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $file = "$document_root/2/orders/order.txt";

            if(file_exists($file)) {
                $order = file($file); // file mi torna un array della lunghezza delle righe del file

                if(sizeof($order) <= 0){
                    echo "<p><strong>Your order could no be processed at this time. Please try again later. </strong></p></body></html>";
                    exit;
                }

                ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Tires</th>
                            <th>Oil</th>
                            <th>Spark Plugs</th>
                            <th>Total</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($order as $item) {
                            echo "<tr>";
                            $variable = explode("\t", $item);
                            foreach ($variable as $key=>$i){
                                echo "<td>{$i}</td>";
                            }
                            echo "<tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <?php

            }

            ?>

    </body>
</html>