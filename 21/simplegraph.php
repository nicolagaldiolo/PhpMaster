<?php

// set up image canvas
$height = 200;
$whidth = 200;

// creaimo la nuova immagine
$im = imagecreatetruecolor($whidth, $height); // Creiamo l'handler, un immagine vuota
//$im = imagecreatefrompng('filename.png'); // oppure partiamo da un immagine reale
//$im = imagecreatefromjpeg('filename.jpeg');
//$im = imagecreatefromgif('filename.gif');

// con imagecolorallocate() stiamo semplicemente allocando questi colori all'immagine, 
//staimo dicendo che l'immagine ha a disposizione questi 2 colori, non stiamo facendo altro.
$white = imagecolorallocate($im, 255, 255, 255);
$blue = imagecolorallocate($im, 0, 0, 255);

// draw on image
imagefill($im, 0, 0, $blue);
imageline($im, 0, 0, $whidth, $height, $white); //immagine, x1, y1, x2, y2
imagestring($im, 4, 50, 150, 'Sales', $white); //immagine, fontsize, x1, y1, scritta, colore


$filename = "filename.png";
imagepng ($im, $filename); //anzichè inviare l'immagine al browser la possiamo salvare sul filesystem passando come secondo parametrop il nome del file

// facciamo direttamente l'ouput dell'immagine
// output image

/////////////// NOTA SULL'HEADER
/// quando chiamiamola funzione header stiamo indicando l'header di questo contenuto ossia informiamo il browser che stiamo
/// inviando un tipo di contenuto, ma se per qualche motivo abbiamo già effettuato un output, es: echo o qualche spazio 
/// prima dell'apertura del tag php l'header viene automaticamente inviato da php e otterremo un errore
header('Content-type: image/png'); //diciamo al browser che il contenuto è un immagine/png e non un testo/html, gli stiamo dicendo come interpretare il contenuto che segue

imagepng ($im);
//imagepng ($im, $filename); anzichè inviare l'immagine al browser la possiamo salvare sul filesystem passando come secondo parametrop il nome del file

// clean up
imagedestroy($im); // eliminiamo la risorsa in memoria