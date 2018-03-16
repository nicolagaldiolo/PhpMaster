<html>
    <head>
        <title>Welcome to phpmaster.local</title>
    </head>
    <body>
        <?php
            if($_POST){

                require_once("file_exceptions.php");

                // htmlspecialchars converte alcuni caratteri tipo & " ' < >
                // htmlentities Converte tutti i possibili caratteri in entità HTML
                $tires  = intval(htmlspecialchars($_POST['tireqty']));
                $oil    = intval(htmlspecialchars($_POST['oilqty']));
                $spark  = intval(htmlspecialchars($_POST['sparkqty']));
                $address  = preg_replace('/\t|\r/',' ', $_POST['address']);
                $date = date('H:i, jS F Y');

                $subtotal = $subtotalTax = 0.00;
                $totalqty = $tires + $oil + $spark;

                if($totalqty > 0) {

                    define('TIRES', 100);
                    define('OILPRICE', 10);
                    define('SPARKPRICE', 4);
                    define('TAX', 0.10);

                    switch ($totalqty) {
                        case ($totalqty >= 10 && $totalqty <= 49):
                            $discount = 5;
                            break;
                        case ($totalqty >= 50 && $totalqty <= 99):
                            $discount = 10;
                            break;
                        case ($totalqty > 100):
                            $discount = 15;
                            break;
                        default:
                            $discount = 0;
                    }

                    $subtotal = ($tires * TIRES) + ($oil * OILPRICE) + ($spark * SPARKPRICE);

                    if($discount > 0){
                        $discount_perc = $discount;
                        $discount_value = ($discount / 100) * $subtotal;
                        $price_not_discount = $subtotal;
                        $subtotal -= $discount_value;
                    }


                    $subtotalTax = $subtotal * (1 + TAX);

                    // apro la connessione al file, se non c'è lo creo
                    $document_root = $_SERVER['DOCUMENT_ROOT'];
                    //die($document_root);

                    try{
                      if(!($fp = @fopen("$document_root/7/bobsAutoPartsOrder/orders/order.txt", 'ab'))){
                        throw new FileOpenException();
                      }

                      $outputstring = $date . "\t" . $tires . " tires \t" .  $oil . " oil \t" . $spark . " spark plugs\t€" . $subtotalTax . "\t" . $address . "\n";

                      // Sistema di bloccaggio file (Per acquisire una chiave esclusiva (in scrittura))
                      if(!flock($fp, LOCK_EX)){
                        throw new FileLockException();
                      };

                      // Scrivo nel file passando la lunghezza della stringa che andrò a scrivere
                      if(!fwrite( $fp, $outputstring, strlen($outputstring))){
                        throw new FileWriteException();
                      };

                      // Sistema di bloccaggio file (Per rilasciare una chiave (condivisa o esclusiva))
                      flock($fp, LOCK_UN);

                      // chiudo la connessione al file
                      fclose($fp);  
                    

                      ?>

                      <h1>Bob's Auto Parts</h1>
                      <p>Order processed at: <?php echo $date; ?></p>
                      <p>Your order is as follow:</p>
                      <?php
  
                          if($tires > 0) {
                              echo $tires . ' tires<br>';
                          }
                          if($oil > 0){
                              echo $oil .' bottle of oil<br>';
                          }
                          if($spark > 0) {
                              echo $spark . 'park plugs<br>';
                          }
  
                      ?>
  
                      <p>
                          Items ordered: <?php echo $totalqty; ?><br>
                          <?php
                              if($discount > 0){
                                  echo 'Discount: ' . $discount_perc . '%<br>';
                                  echo 'Discount value: ' . number_format($discount_value, 2, '.', '') . '<br>';
                                  echo 'Prezzo pieno: ' . number_format($price_not_discount, 2, '.', '') . '<br>';
                              }
                          ?>
                          <span style="color: red;">
                              Subtotal: <?php echo number_format($subtotal, 2, '.', ''); ?><br>
                              Total including tax: <?php echo number_format($subtotalTax, 2, '.', ''); ?>
                          </span>
                      </p>
  <?php                    
                    // il fatto di avere il doppio catch è solo a scopi dimostrativo, non servirebbe in quanto tutte le eccezzioni 
                    // sollevate sono istanze di classi che estendono tutte la classe Exception
                    // Se l'eccezzione sollevata è di tipo "FileOpenException" entro nel primo catch in quanto il primo catch cattura le eccezzioni di tipo FileOpenException
                    // se però invertissi l'ordine dei catch mettendo prima Exception e poi FileOpenException entrebberre nella prima Exception in quanto FileOpenException estende la classe Exception
                    // se non trovo un catch di tipo FileLockException utilizzo il generico Exception (questo spiega perchè non serve in questo caso avere due catch) mentre se non avessi definitvo un catch 
                    // generico e avessi sollevato un eccezione di tipo FileLockException avrei ricevuto un fatal error
                    }catch (FileOpenException $foe){
                      echo '<pre>', $foe->__toString(), '</pre>';
                    }catch (Exception $e){
                      echo '<pre>', $e->__toString(), '</pre>';
                    }
?>
                <?php }else{ ?>
                    <p style="color:red;">You did not order Anything.</p>

                <?php } ?>
            <?php } ?>
    </body>
</html>