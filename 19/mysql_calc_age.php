<?php

$con = mysqli_connect("localhost","root",'');

// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_POST){
    array_filter($_POST, 'is_numeric');
    $day = intval($_POST['day']) > 0 ? intval($_POST['day']) : 0;
    $month = intval($_POST['month']) > 0 ? intval($_POST['month']) : 0;
    $year = intval($_POST['year']) > 0 ? intval($_POST['year']) : 0;
    $age = '';
    if( $day > 0 && $month > 0 && $year > 0){
        $bdayISO = date("c", mktime (0, 0, 0, $month, $day, $year));
        //use Mysql to calculate date
        $db = mysqli_connect('localhost', 'root', '');
        $res = mysqli_query($db, "SELECT DATEDIFF(NOW(),'{$bdayISO}');"); //mysql torna la differenza tra le date in giorni
        $current = mysqli_fetch_array($res);
        
        $age = 'La tua età è: ' . floor($current[0] / 365.25);
    }else{
        $age = 'Dati inseriti non validi';
    }   
}
?>

<html>
    <head></head>
    <body>
        
        <form method="POST">
            <p>
                <label>Giorno</label>
                <input type="number" name="day">
            </p>
            <p>
                <label>Mese</label>
                <input type="number" name="month">
            </p>
            <p>
                <label>Anno</label>
                <input type="number" name="year">
            </p>
            <button>Submit</button>
        </form>
        <?php if(!empty($age)){ ?>
        <h1><?php echo $age?></h1>
        <?php } ?>
    </body>
</html>