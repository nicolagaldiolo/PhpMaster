<?php
  /**
   * Created by PhpStorm.
   * User: chloe
   * Date: 25/04/18
   * Time: 09:41
   */
  
  $pippo = `htpasswd -b /Users/chloe/Projects/Httpdocs/Corsi/phpmaster/16/http_basic_authentication/apache/.htpass admin test101`;
  
  echo var_dump($pippo);
  die();