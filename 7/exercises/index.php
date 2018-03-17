<?php

/*
Programming Exercises
1. Modify the following PHP code in such a way that you trigger the exception-handling mechanism.

       ___ new ___($message, $code);

2. Modify the following PHP code such that it runs cleanly.

       ___ {
       // do something, maybe throw some exceptions
       } ___ (Exception $e) {
       // handle exception
       } ___ {
       echo 'Always runs!';
       }

3. Modify the following code to trap exceptions of the Exception class and store the results in the variable $e.

       catch (___ ___)
       {
         // handle exception
       }

4. Type the PHP Exception class's built-in method that returns the full path to the code file where the exception was raised.

5. Type the PHP Exception class's built-in method that returns an array containing a backtrace where the exception was raised.
*/

try{
  throw new Exception("Hi, we throw new Exception", 42);
}catch( Exception $e){
  echo "Exception ". $e->getCode(). "<br />";
  echo "Message: ". $e->getMessage(). "<br />"; 
  echo "File: " . $e->getFile(). "<br />";
  echo "On line ". $e->getLine(). "<br />";
  echo "Trace: ", print_r($e->getTrace()) , "<br />";
  echo "Trace as String: ". $e->getTraceAsString() . "<br />";
  echo "Error to string: ", $e->__toString(),  "<br />";
}finally{
  echo "\nAlways runs!";
}