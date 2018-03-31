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

        $user = 'bookorama';
        $password = '';
        $host = 'localhost';
        $db_name = 'books';

        // connect to database
        try {
          $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
          
          $query = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchtype = :searchterm"; // creo il template da usare e inserisco all'interno del placeholder
          $stmt = $db->prepare($query); // costruisco l'oggetto $stmt che mi permette di eseguire la query passando la query template
          $stmt->bindParam(':searchterm', $searchterm); // faccio la sostituzione dei paramteri con i placeholder (specificando il tipo di dato che andrò a passare - s, sta per stringa)
          // esempio di tipo di bind parameter con pdo: http://php.net/manual/en/pdostatement.bindparam.php#example-1047
          $stmt->execute(); // eseguo la query
          
          //get number of returned rows
          echo "<p>Number of books found: " . $stmt->rowCount() . "</p>";

          // display each returned rows
          while($result = $stmt->fetch(PDO::FETCH_OBJ)){
            echo "<p><strong>Title: {$result->Title}</strong></p>";
            echo "<p>Author: {$result->Author}</p>";
            echo "<p>ISBN: {$result->ISBN}</p>";
            echo "<p>Price: € " . number_format($result->Price, 2) . "</p>";
          }

          // disconnect from db
          $db = NULL;


        }catch(PDOException $e){
          echo "Error: " . $e->getMessage();
          exit;
        }
      }
    ?>
  </body>
</html>