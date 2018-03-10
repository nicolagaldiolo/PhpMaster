<?php

class A {
  public static function whichclass(){
    echo __CLASS__;
  }
  public static function test(){
    // self fa riferimento a me stesso quindi quando in B viene chiamato il metodo test (ereditato da A)
    // il metodo effettivamente invocato è quello di A e non di B
    self::whichclass();
  }
  public static function test2(){ // per avere il comportamente atteso devo chiamarlo con static::whichclass()
    static::whichclass();
  }

}

class B extends A{
  public static function whichclass(){
    echo __CLASS__;
  }
}


A::test(); //A
A::test2(); //A
B::test(); //A
B::test2(); //B