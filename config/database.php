<?php

class DB {
  // connect to databasa
  private $pdo = null;
  private $result = null;
  public $error;

  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // close connection
  function __destruct () {
    if ($this->result !== null) { $this->result = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }
 
  // execute sql (delete, update, insert)
  function exec ($sql, $data=null) {
    try {
      $this->result = $this->pdo->prepare($sql);
      $this->result->execute($data);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }
 
  // fetch data
  function fetch ($sql, $data=null) {
    if ($this->exec($sql, $data) === false) { return false; }
    return $this->result->fetch();
  }
}