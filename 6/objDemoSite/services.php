<?php

require("classes/classes.php");

$services = new PageServices;

$services->content = "<p>At TLA Consulting, we offer a number of services.  Perhaps the productivity of your employees would improve if we re-engineered your business. Maybe all your business needs is a fresh mission statement, or a new batch of buzzwords.</p>";

$services->Display();