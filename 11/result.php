<!DOCTYPE html>
<html>
  <head>
    <title>Book-O-Rama Search Result</title>
  </head>

  <body>
    <h1>Book-O-Rama Search Result</h1>
    <?php

      if($_POST){
        $searchtype = $_POST['searchtype'];
        $searchterm = trim($_POST['searchterm']);

        if(!$searchterm || !$searchterm){
          echo '<p>You have not entered search details.<br/>
          Please go back and try again.</p>';
          exit;
        }

        // whitelist the search type
        switch($searchtype){
          case 'Author':
          case 'Title':
          case 'ISBN':
            break;
          default:
            echo '<p>That is not a valid search type. <br> Please go back and try again.</p>';
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
        $query = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchtype = ?"; // creo il template da usare e inserisco all'interno del placeholder

        $stmt = $db->prepare($query); // costruisco l'oggetto $stmt che mi permette di eseguire la query passando la query template
        $stmt->bind_param('s', $searchterm); // faccio la sostituzione dei paramteri con i placeholder (specificando il tipo di dato che andrò a passare - s, sta per stringa)
        $stmt->execute(); // eseguo la query
        
        // METODO 1
        
        $stmt->store_result(); // salvo i risultati in pancia dell'oggetto (non è obbligatorio ma mi permette ad esempio di ottenre il numero delle righe tornate).
        $stmt->bind_result($isbn, $author, $title, $price); // dichiaro le variabili dove verranno salvati i valori di ogni colonna
        // ps: le variabili non sono ancora valorizzate, vengono valorizzare quando chiamo il metodo $stmt->fetch()
        echo "<p>Number of books found: " . $stmt->num_rows . "</p>";
        
        while($stmt->fetch()){ // vado a prendere i valori delle singole colonne e li salvo nelle variabili passate al metodo bind_result()
          // Il metodo ogni volta che viene lanciato va a prendere la riga successiva e torna true o false se trova la riga o no
          echo "<p><strong>Title: {$title}</strong></p>";
          echo "<p>Author: {$author}</p>";
          echo "<p>ISBN: {$isbn}</p>";
          echo "<p>Price: € " . number_format($price, 2) . "</p>";
        }
        
        
        // METODO 2
        /*
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()){
          // $result->fetch_assoc() o $result->fetch_array(MYSQLI_ASSOC) | torna la singola riga del db sofforma di array con i nomi del campi come key
          // $result->fetch_array(MYSQLI_NUM) | torna la singola riga del db sofforma di array con key numerica
          // $result->fetch_array() o $result->fetch_array(MYSQLI_BOTH) torna la singola riga del db sofforma di array con i risultati doppi, ogni colonna viene ritoranta 2 volte, una con chiave numerica, una con il nome della colonna come chiave
          // $result->fetch_object() // torna la singola riga del db sofforma di oggetto
          echo '<pre>', var_dump($row), '</pre>';  
        }
        */

        // METODO 3
        /*
        $result = $stmt->get_result();
        $row = $result->fetch_all(); // Torna un array con tutte le righe senza dover fare il ciclo while ( TIPI DI ARRAY TORNATI : MYSQLI_ASSOC | MYSQLI_NUM | MYSQLI_BOTH )
        echo '<pre>', var_dump($row), '</pre>';  
        */

        $stmt->free_result();
        $db->close();
      }
    ?>
  </body>
</html>