<html>
<head>
    <title>Welcome to phpmaster.local</title>
</head>
<body>
    <?php

    $document_root = $_SERVER['DOCUMENT_ROOT'];

    echo '<h2>file_exists()</h2>';

    if(file_exists("$document_root/2/orders/order.txt")){
        echo "il file esiste";
    }else{
        echo "il NON file esiste";
    }

    ?>

</body>
</html>