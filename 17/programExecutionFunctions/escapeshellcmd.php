<?php

// https://stackoverflow.com/questions/1881582/whats-the-difference-between-escapeshellarg-and-escapeshellcmd

$escapeshellcmd = $_POST['escapeshellcmd'];
$escapeshellarg = $_POST['escapeshellarg'];

if((!empty($escapeshellcmd) && !is_null($escapeshellcmd)) || (!empty($escapeshellarg) && !is_null($escapeshellarg))){
    if(!empty($escapeshellcmd) && !is_null($escapeshellcmd)) {
        echo 'Comando lanciato: ls -la '. $escapeshellcmd . PHP_EOL;

        system(escapeshellcmd('ls -la ' . $escapeshellcmd));
    }
    if(!empty($escapeshellarg) && !is_null($escapeshellarg)) {
        echo 'Comando lanciato: ls -la \''. $escapeshellarg . '\'' . PHP_EOL;
        system('ls -la ' . escapeshellarg($escapeshellarg));
    }

}else{
    $html = <<<HTML
    
    <style>
        div{
            display: flex; 
            align-items: center;
        }
        label{
            flex-shrink: 0;
            padding: 0 10px 0 0;
        }
        input{
            width: 100%; 
            padding: 10px;
        }
        button{
            display: block;
            margin-top: 10px;
            width: 100%;
        }
    </style>
    
    <h1> use of escapeshellcmd()</h1>
    <form method="post">
        <p>Questo comando permette di lanciare ls di più cartelle, es: <strong>/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16 /Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17</strong></p>
        <div>
            <label>ls -la</label>
            <input type="text" name="escapeshellcmd" placeholder="insert a path" value="/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16 /Users/chloe/Projects/Httpdocs/Corsi/phpmaster/17">
        </div>
        <button type="submit">Submit</button>
    </form>
    
    <h1> use of escapeshellarg()</h1>
    <form method="post">
        <p>Questo comando permette di lanciare ls su una cartella sola perchè escapeshellarg() permette un solo argomento, es: <strong>/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16</strong></p>
        <div>
            <label>ls -la</label>
            <input type="text" name="escapeshellarg" placeholder="insert a path" value="/Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16">
        </div>
        <button type="submit">Submit</button>
    </form>
HTML;


    echo $html;
}