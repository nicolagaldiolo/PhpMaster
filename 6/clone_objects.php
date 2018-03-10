<?php
class Person{
	private $ssn;
	private $firstName;
	private $lastName;

	public function __construct($ssn,$firstName,$lastName){
		$this->ssn = $ssn;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

  public function __set($name, $value){
		$this->$name = $value;
	}

	public function __destruct(){
		echo sprintf("Person with SSN# %s is terminated.<br>",
				$this->ssn);
	}

	public function __toString(){
		return sprintf("SSN: %s, Name: %s, %s<br>",
				$this->ssn,
				$this->lastName,
				$this->firstName);
	}

	public function __clone(){ // metodo che viene implicitamente invocato quando clono un oggetto
		echo 'Copying object <br>';
	}
}

// Utilizzando l'operatore binario = faccio una copia supercifiale ossia copio l'oggetto per rifemento
// e questo comporta che ogni cambiamento applicato a $p1 viene applicato anche a $ps perchè fanno riferimento 
// allo stesso puntatore in memoria
function shallow_copy(){
	
	$p1 = new Person('1234567888', 'Doe', 'John');
  $p2 = new Person('1234567889','Grace','Dell');
  
  $p2 = $p1;
  echo $p1;
  echo $p2;

  $p1->firstName = "Geltrude";

  echo $p1;
  echo $p2;
}

// utilizzando il costrutto clone faccio una copia reale rendendo i due oggetti indipendenti.
shallow_copy();

function deep_copy(){
  $p1 = new Person('1234567888', 'Doe', 'John');
  $p2 = clone $p1;
  
  $p1->firstName = "Geltrude";
  
  echo $p1;
  echo $p2;
}

deep_copy();