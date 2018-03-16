<?php

class FileOpenException extends Exception {
  public function __toString(){
    return "fileOpenException ". $this->getCode(). ": ". $this->getMessage()."<br />"." in " . $this->getFile(). " on line ". $this->getLine() . "<br />";
  }
}

class FileWriteException extends Exception {
  public function __toString(){
    return "fileWriteException ". $this->getCode(). ": ". $this->getMessage()."<br />"." in " . $this->getFile(). " on line ". $this->getLine() . "<br />";
  }
}

class FileLockException extends Exception {
  public function __toString(){
    return "fileLockException ". $this->getCode(). ": ". $this->getMessage()."<br />"." in " . $this->getFile(). " on line ". $this->getLine() . "<br />";
  }
}