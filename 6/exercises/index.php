<?php

/*

Programming Exercises
1. Edit the following PHP class definition to add a public attribute named attribute1.

     class MyClass
     {
        ______
     }

2. Define an object named $c that instantiates an instance of the class MyClass, using no parameters.

3. Modify the following code to specify that the B class is a subclass of the A class.

     class B ____ A {}

4. Define a PHP variable named $c that is a copy of object $b of the same class with the same attribute values.

5. Create a namespace named orders to hold all your order-related PHP code.
*/

namespace test\www\myclass; // non devo fare altro perchè instanzio le classi direttamente dove le dichiaro quindi tutti i riferimenti impliciti fanno già riferimento al namespaces corrente

class A {
  public $attribute1 = "attribute1";
}

class MyClass extends A{
}

$c = new MyClass();
echo $c->attribute1;

$d = clone $c;

$c->attribute2 = "pippo";
$d->attribute2 = "pluto";

echo $c->attribute2;
echo $d->attribute2;