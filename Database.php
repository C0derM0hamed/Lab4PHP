<?php

class Database {
private static $instatnce = null;

private $connection;

private function __construct(){

    $this->connection = new PDO(
        "mysql:host=127.0.0.1;dbname=lab2",
        "root",
        "root123"
    );

    $this->connection->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
}

public static function getInstance(){
  if (self::$instatnce === null) {
    self::$instatnce = new Database();
  }
  return self::$instatnce;  
}

public function getConnection(){
    return $this->connection;
}

}

?>