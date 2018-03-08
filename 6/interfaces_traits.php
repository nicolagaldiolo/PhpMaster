<?php
  
  ////////////////////////////////////////////////
  // INTERFACCIA
  // Displayable è un'interfaccia, ossia definisco uno schema che deve obbligatoriamente avere la classe che lo implementa
  ////////////////////////////////////////////////

  interface Displayable{
    function display();
  }

  class webPage implements Displayable{ // una classe PUO' implementare 1 o più interfacce
    public function display(){
      //se non c'è il metodo display viene generato un errore perchè l'interfaccia utilizzata prevede che ci sia il metodo
    }
  }

  
  ////////////////////////////////////////////////
  // TRAIT
  // A differenza di un interfaccia che è uno schema implememntativo, il trait è uno snippet di codice, un pezzo di classe
  // che può essere incluso in una o più classi. tecnicamente funziona come un include o require. Il trait raggruppa un insieme
  // di metodi o proprietà che posso essere inclusi e utlizzati in una o più classi
  ////////////////////////////////////////////////
  
  trait helloWorld {
    //public $value = "3°";
    public function helloWorldMethod(){
      echo "Hello World <br>";
    }
  }

  trait fileLogger {
    public function logMessage( $message, $level='DEBUG'){
      echo $message . " | Level: ($level) <br>";
    }
  }

  trait sysLogger {
    public function logMessage( $message, $level='ERROR'){
      echo $message . " | Level: ($level) <br>";
    }
  }

  
  // i traid possono definire proprietà e metodi.
  // se un metodo viene ridefinito nella classe vince il metodo della classe ma se ridefinisco una proprietà
  // genero un errore


  class fileStorage {
    use helloWorld; // includo il trait nella classe con il costrutto use
    
    public $value = "5°"; 
    public function helloWorldMethod(){
      echo "Ciao da dentro la classe {$this->value}<br>";
    }
    public function simplePrint(){
      return $this->helloWorldMethod();
    }

    // posso includere 2 trait che definiscono lo stesso metodo ma devo ribattezzarli altrimenti ricevo un errore
    use fileLogger,sysLogger {
      fileLogger::logMessage insteadOf sysLogger; // dichiaro di usare il metodo logMessage dal trait fileLogger inceve che dal trait sysLogger
      sysLogger::logMessage as private logSysMessage; // ribattezzo il metodo logMessage del trait sysLogger e POSSO anche cambiare il tipo di visibilità del metodo.
    }

    public function printLog($message){
      $this->logMessage($message);
      $this->logSysMessage($message);
    }

  }

  $obj = new fileStorage;
  $obj->helloWorldMethod();
  $obj->printLog("Ciao, da obj");