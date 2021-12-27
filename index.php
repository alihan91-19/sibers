<?php

require_once "./core.php";

$isLogin = false;

if(isset($_SESSION["user"]["id"])) {
  $isLogin = true;
  // select user by id from db
  // if user !exist $isLogin = false; unset session;
} else {
  // if password and email select user from db by email and chech password
  // if data is right set session id as user id and redirect to index.php
  // else return error
  // show form with or withour error
}

if($isLogin) {
  // connect to db
  // select users
  // add user
  // edit user
  // delete user

  require_once PATH_CONFIG . "database.php";

  $DB = new DB();  

  switch ($_POST["req"]) {
    case "add":
      require_once PATH_MODULES . "create.php";
      $tmp = "form";
      break;
    case "edit":
      require_once PATH_MODULES . "update.php";
      $tmp = "form";
      break;
    case "delete":
      require_once PATH_MODULES . "delete.php";
      break;
    default: 
      require_once PATH_MODULES . "read.php";
      $tmp = "data";      
    break;
  }
 
} else {
  $tmp = "login"; 
}

require_once PATH_TMP . "main.php";

//EOF