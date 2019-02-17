<?php

eval("echo 'Hello World';");

// - può essere utile per salvare pezzi di codice sul db e poi (essendo una stringa) si può utilizzare la funzione eval per valutarli.
// - viene usato solitamente nei template engine dove puoi trovare un misto di html, php e testo piatto
// - potresti avere dei vecchi script che hanno bisogno di essere rivisti, potresti creare uno script che interpreta il vecchio script come una stinga,
//   applichi una regex per modificare alcune parti dello script e poi valuti il tutto con eval
// - potresti permettere la scrittura di script nel browser ed eseguirlo lato server (anche se molto sconsigliato)

