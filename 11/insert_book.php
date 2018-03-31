<!DOCTYPE html>
<html>
  <head>
    <title>Book-O-Rama Entry Result</title>
  </head>

  <body>
    <h1>Book-O-Rama Entry Result</h1>
    <?php

      if($_POST){
        
        $isbn   = trim($_POST['ISBN']);
        $author = trim($_POST['Author']);
        $title = trim($_POST['Title']);
        $price = doubleval(convertPrice(trim($_POST['Price']))); // mi assicuro che il valore che mi arriva sia un numero a virgola mobile

        if(!isset($isbn) || !isset($author) || !isset($title) || !isset($price)){
          echo '<p>You have not entered all the required details.<br/>Please go back and try again.</p>';
          exit;
        }
        
        $db = new mysqli('localhost', 'bookorama', '', 'books');
        
        if($db->connect_errno){ 
          // torna 0 (che è false) se la connessione ha successo oppure un codice di errore 
          // (un numero valido quindi TRUE) in caso di insuccesso
          echo '<p>Error: Could not connect to database. <br>Please try again later.</p>';
          exit();
        }

        // meglio usare questo pattern perchè così puoi controllare i dati che stai usando piuttosto che passare 
        // alla query direttamente i dati, per una questione di sicurezza
        $query = "INSERT INTO Books VALUES (?,?,?,?)"; // creo il template da usare e inserisco all'interno del placeholder
        $stmt = $db->prepare($query); // costruisco l'oggetto $stmt che mi permette di eseguire la query passando la query template
        $stmt->bind_param('sssd', $isbn, $author, $title, $price); // faccio la sostituzione dei paramteri con i placeholder (specificando il tipo di dato che andrò a passare - s, sta per stringa)
        $stmt->execute(); // eseguo la query
        
        if($stmt->affected_rows > 0){
          echo '<p>Book insered into the database</p>';
        }else{
          echo '<p>An error has occurred.<br/>The item was not added.</p>';
        }
        $db->close();
      }

      function convertPrice($string_number){
        return floatval(str_replace(',', '.', str_replace('.', '', $string_number)));
      }
    ?>
  </body>
</html>