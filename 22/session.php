<?php

//Quando un browser si collega a un URL, cerca prima i cookie memorizzati localmente. 
//Se uno qualsiasi dei cookie memorizzati localmente è pertinente al dominio e al percorso a cui è connesso, 
//le informazioni memorizzate nel cookie o nei cookie verranno ritrasmesse al server.

//Tra i cookie che vengono inviati c'è anche il cookie che contiene l'id di sessione, se è presente viene trasmesso altrimenti
// il server creerà un nuovo id di sessione che manderà al browser

//LA SESSIONE SCADE AUTOMATICAMENTE DOPO 24 MINUTI (impostazione di default nel file php.ini - session.gc_maxlifetime)

// iniziare una sessione (se NON è presente un id sessione) o richiamare la sessione attiva (se è presente un id sessione)
session_start();

// settare una varibile di sessione
$_SESSION['myvar'] = 5;

// stampare il contenuto di $_SESSION
echo var_dump($_SESSION);

// controllare una variabile di sessione
if(isset($_SESSION['myvar'])){
    echo 'il valore della variabile "myvar" è: ' . $_SESSION['myvar'] . '</br>';
}

// eliminare qualcosa dalla sessione
unset($_SESSION['myvar']);

// per eliminare tutto il contenuto di $_SESSION
$_SESSION = array();

//Al termine di una sessione, è necessario prima disinserire tutte le variabili e quindi chiamare session_destroy(); per pulire l'ID di sessione.
session_destroy();


