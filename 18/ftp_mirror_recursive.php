<!DOCTYPE html>
<html>
<head>
    <title>Mirror Update</title>
</head>
<body>
<h1>Mirror Update</h1>

<?php

require_once ("../config.php");

$localFolder = "tmp_recursive";

// creo la cartella se non esiste
if (!file_exists($localFolder)) {
    mkdir($localFolder, 0777, true);
}

// setto le variabili di connessione
$host = FTP_HOST;
$user = FTP_USER;
$pass = FTP_PASSWORD;
$remoteDocumentRoot = '/test_to_delete/html';
//$localfile = $folder . '/ftp_synchronized.html';


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


$ftp_remote_folder = ftp_nlist($conn, $remoteDocumentRoot);
echo '<pre>', var_dump($ftp_remote_folder), '</pre>';

manageFile($ftp_remote_folder, $conn, $remoteDocumentRoot, $localFolder);


// 5 = CHIUDERE CONNESSIONE FTP
ftp_close($conn);





function manageFile($ftp_remote_folder, $conn, $remoteDocumentRoot, $localFolder){

    foreach ($ftp_remote_folder as $item) {


        if ($item == '..' || $item == '.') continue;

        if (count(explode(".", $item)) <= 1) { // sono una directory
            $localFolder = $localFolder . "/" . $item;
            if (!file_exists($localFolder)) {
                mkdir($localFolder, 0777, true);
            }

            $ftp_remote_folder = ftp_nlist($conn, $remoteDocumentRoot . "/" . $item);
            manageFile($ftp_remote_folder, $conn, $remoteDocumentRoot, $localFolder);

        } else {
            $localtime = 0;
            $localFile = $localFolder . "/" . $item;

            $remoteFile = $remoteDocumentRoot . "/" . $item;

            if (file_exists($localFile)) {
                //$fp = fopen($localFolder . "/" . $item, 'wb');
                //fclose($fp);
                $localtime = filemtime($localFile);
                echo '<h3>Local file last updated</h3> Date: ' . date('G:i j-M-Y', $localtime) . ' | Timestamp: ' . $localtime . '<br />';
            }

            echo '<h3>File remoto </h3> ' . $item . '<br />';

            // tento di recuperare la data di modifica del file remoto. In caso di fallimento viene tornato -1
            $remotetime = ftp_mdtm($conn, $remoteFile);


            echo '<h3>Data </h3> ' . $remotetime . '<br />';

            // poichè NON tutti i server remoti supportano questa funzionalità
            // mi assicuro che se non riesco a recuperare la data di modifica remota, essa sia sempre superiore a quella locale forzandola manualmente per
            // ottenre sempre l'aggiornamento del file locale
            if (!($remotetime >= 0)) {
                $remotetime = $localtime + 1;
                echo '<h3>Can\'t access remote file time.</h3>';
            } else {
                echo '<h3>Remote file last updated</h3> Date: ' . date('G:i j-M-Y', $remotetime) . ' | Timestamp: ' . $remotetime . '<br />';
            }

            if ($remotetime > $localtime) {

                $fp = fopen($localFile, 'wb'); // apro il file in modalità solo scrittura e in binary mode (= per evitare problemi di codifca dei dati dovuti ai diversi sistemi operativi).
                echo '<hr/><h3>Getting file from server...</h3>';

                // tento di scaricare il file e copiarlo nel file locale aperto poco fa
                if (!ftp_fget($conn, $fp, $remoteFile, FTP_BINARY)) {
                    // potrei usare ftp_get() che anzichè un file handler si aspetta solo il percorso locale.
                    // le due modalità sono FTP_ASCII e FTP_BINARY. La prima si preoccupa di convertire i ritorni a capo con la corretta codifica del OS (\n for Unix, \r\n for Windows, and \r for Macintosh).
                    // mentre FTP_BINARY prende il file così com'è senza fare nulla.
                    echo 'Error: Could not download file.';
                } else {
                    echo 'File downloaded successfully.';
                }

                fclose($fp); // chiuso il file locale

            }
        }
    }
}



// NB:
// Per uploadare i file posso usare ftp_fput() e ftp_put() che sono gli opposti di ftp_fget() e ftp_get()
// NON esiste una funzione per scaricare più file contemporaneamente, occorre chiamare più volte ftp_fget() o ftp_get()
// evita il timeout chiamando set_time_limit(90);

?>
</body>
</html>