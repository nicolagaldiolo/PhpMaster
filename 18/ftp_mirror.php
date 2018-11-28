<!DOCTYPE html>
<html>
<head>
    <title>Mirror Update</title>
</head>
<body>
<h1>Mirror Update</h1>

<?php

require_once ("../config.php");

// creo la cartella se non esiste
if (!file_exists('tmp')) {
    mkdir('tmp', 0777, true);
}

// setto le variabili di connessione
$host = FTP_HOST;
$user =FTP_USER;
$pass = FTP_PASSWORD;
$remotefile = '/html/readme.html';
$localfile = 'tmp/ftp_synchronized.html';


// STEP DI CONNESSIONE FTP
// 1 = CONNESSIONE AL SERVER FTP
// 2 = LOGIN
// 3 = CHECK SE IL FILE REMOTO È AGGIORNATO
// 4 = SE AGGIORNATO, SCARICHIAMOLO
// 5 = CHIUDERE CONNESSIONE FTP



// 1 = CONNESSIONE AL SERVER FTP
//viene tornato un handler oppure false
$conn = @ftp_connect($host); // uso @ davanti a ftp_connect per sopprimere gli errori per gestirli manualmente, altrimenti si viene mostrato un warning
if (!$conn){
    echo 'Error: Could no connect to ' .$host;
    exit; // non serve usare ftp_quit in quanto non sono ancora connesso
}
echo 'Connected to '.$host.'<br />';



// 2 = LOGIN
$result = @ftp_login($conn, $user, $pass);
if (!$result) {
  echo 'Error: Could not log in as '.$user;
  ftp_quit($conn);
  exit;
}
echo 'Logged in as ' . $user . '<br />';

ftp_pasv($conn, true); // Turn on passive mode || https://stackoverflow.com/questions/1699145/what-is-the-difference-between-active-and-passive-ftp/1699163



// 3 = CHECK SE IL FILE REMOTO È AGGIORNATO
echo 'Checking file time...<br />';

$localtime = 0; // setto di default la data di modifica del file a zero
if(file_exists($localfile)) { // se il file esiste setto la data di mofica effettiva
    $localtime = filemtime($localfile);
    echo '<h3>Local file last updated</h3> Date: ' . date('G:i j-M-Y', $localtime) . ' | Timestamp: ' . $localtime . '<br />';
}


// tento di recuperare la data di modifica del file remoto. In caso di fallimento viene tornato -1
$remotetime = ftp_mdtm($conn, $remotefile);

// poichè NON tutti i server remoti supportano questa funzionalità
// mi assicuro che se non riesco a recuperare la data di modifica remota, essa sia sempre superiore a quella locale forzandola manualmente per
// ottenre sempre l'aggiornamento del file locale
if (!($remotetime >= 0)) {
    $remotetime = $localtime+1;
    echo '<h3>Can\'t access remote file time.</h3>';
}else {
    echo '<h3>Remote file last updated</h3> Date: ' . date('G:i j-M-Y', $remotetime) . ' | Timestamp: ' . $remotetime . '<br />';
}

if ($remotetime < $localtime) { // il file locale è aggiornato, non serve il download
    echo '<hr /><h3>*** Local copy is up to date. ***</h3><hr />';
    exit;
}


// 4 = SE AGGIORNATO, SCARICHIAMOLO
$fp = fopen($localfile, 'wb'); // apro il file in modalità solo scrittura e in binary mode (= per evitare problemi di codifca dei dati dovuti ai diversi sistemi operativi).
echo '<hr/><h3>Getting file from server...</h3>';

// tento di scaricare il file e copiarlo nel file locale aperto poco fa
if(!ftp_fget($conn, $fp, $remotefile, FTP_BINARY)){
    // potrei usare ftp_get() che anzichè un file handler si aspetta solo il percorso locale.
    // le due modalità sono FTP_ASCII e FTP_BINARY. La prima si preoccupa di convertire i ritorni a capo con la corretta codifica del OS (\n for Unix, \r\n for Windows, and \r for Macintosh).
    // mentre FTP_BINARY prende il file così com'è senza fare nulla.
    echo 'Error: Could not download file.';
}else{
    echo 'File downloaded successfully.';
}

fclose($fp); // chiuso il file locale


// 5 = CHIUDERE CONNESSIONE FTP
ftp_close($conn);



// NB:
// Per uploadare i file posso usare ftp_fput() e ftp_put() che sono gli opposti di ftp_fget() e ftp_get()
// NON esiste una funzione per scaricare più file contemporaneamente, occorre chiamare più volte ftp_fget() o ftp_get()
// evita il timeout chiamando set_time_limit(90);

?>
</body>
</html>