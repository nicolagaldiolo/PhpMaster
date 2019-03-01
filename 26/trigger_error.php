<?php

// Errori sollevati dall'utente, se non specidifco il secondo parametro il default è: E_USER_NOTICE

trigger_error("This is an notice through by the user", E_USER_NOTICE);

trigger_error("This is an warning through by the user", E_USER_WARNING);

trigger_error("This is an error through by the user", E_USER_ERROR);