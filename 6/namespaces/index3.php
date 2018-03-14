<?php

include "class.php";

// IMPORTO UN NAMESPACES
use myclass\page\test;
$c = new test\Page();

// IMPORTO UN NAMESPACES COME ALIAS
use myclass\page\test as www;
$d = new www\Page();