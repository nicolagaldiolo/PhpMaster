<?php

    
    $db = new mysqli("localhost", "root", "", "user");
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        //exit;
    }

    $result = $db->query("SELECT * FROM TABLE_THAT_NOT_EXIST LIMIT 10");
    if (!$result) {
        echo "Failed to query: (" . $db->errno . ") " . $db->error;
        //exit;
    }
    echo var_dump($result);

    
    // connections to network services
    $sp = fsockopen('localhost', 5000); // torna un warning

    $sp = @fsockopen ('localhost', 5000, $errorno, $errorstr ); // lo faccio fallire in modalità silente e gestisco manualmente il fallimento
    if(!$sp) {
        echo "ERROR: ".$errorno.": ".$errorstr;
    }

    for ( $i = 0; $i < 10; $i++ );
    {
        echo 'doing something<br />';
    }