<?php

// explode();
$email_address = array('paperino@libero.com', 'minni@gmail.com', 'pippo@gmail.com', 'pluto@yahoo.com', 'zioparone@virgilio.com');

$gmail_user = array();
// ciclo l'array degli indirizzi email
foreach($email_address as $item){
  $tmp_item = explode('@', $item); // esplodo l'indirizzo email per trovare quelli di gmail
  if(strtolower($tmp_item[1]) == 'gmail.com'){
    array_push($gmail_user, $item);
  }
}
echo var_dump($gmail_user);

// implode() - alias(join());

$address = array(
  'via'     => 'Via Giovanni Caboto',
  'civico'  => '3/A',
  'cap'     => '37060',
  'paese'   => 'Vigasio',
  'citta'   => 'Verona'
);

$addressString = implode(' - ', $address);
echo $addressString;

echo '<hr>';

// strtok()

// simile a explode solo torna il primo risultato che deve matchare con uno dei caratteri passati come parametro
$email = "galdiolo.nicola@gmail.com";
$tok = strtok($email, ".@");

while($tok != ''){
  echo $tok.'<br>';
  $tok = strtok(".@"); // La funzione mantiene il proprio puntatore interno nella sua posizione nella stringa. 
  // infatti per passare al risultato successivo mi basta passare solo il parametro per fare il match
  // Se si desidera ripristinare il puntatore, è possibile passare nuovamente la stringa in esso
}

?>