<?php

require_once "./core.php";

print_r ($_POST);

$isLogin = false;

if (isset($_GET["logout"])){
  unset($_SESSION["user"]);
}

if(isset($_SESSION["user"]["id"])) {
  $isLogin = true;
  // select user by id from db
  // if user !exist $isLogin = false; unset session;
} else {
  // if password and email select user from db by email and chech password
  // if data is right set session id as user id and redirect to index.php
  // else return error
  // show form with or withour error

  if (isset($_POST['password']) && isset($_POST['email'])) {
    require_once PATH_CONFIG . "database.php";
    $DB = new DB();
      $user = $DB->fetch(
        "SELECT * FROM `users` WHERE `email`=?", [$_POST["email"]]
      );
      if(is_array($user)) {
        print_r ($user);
        //$pass = password_verify($_POST["password"], $user["password"]);
        $pass = md5($_POST["password"]) == $user["password"] ? true : false;

        if ($pass){
          print_r ($pass);
          $_SESSION["user"]["id"] = $user["id"];
          header("Location: " . PATH_BASE);
        }
        
      }
  
  }
}

if($isLogin) {
  
  // select users
  // add user
  // edit user
  // delete user

  // connect to db
  require_once PATH_CONFIG . "database.php";

  $DB = new DB();  

  switch ($_GET["req"]) {
    case "add":
      $actionPath = PATH_BASE . "?req=add";
      require_once PATH_MODULES . "create.php";
      $tmp = "form";
      break;
    case "edit":
      $id = intval($_GET["id"]);
      if($id){
        $actionPath = PATH_BASE . "?req=edit&id={$id}";
        require_once PATH_MODULES . "update.php";
      }
      $tmp = "form";
      break;
    case "delete":
      require_once PATH_MODULES . "delete.php";
      break;
    case "view":
      $id = intval($_GET["id"]);
      if($id){
        require_once PATH_MODULES . "read.php";
      }
      $tmp = "view";
      break;
    default: 
      require_once PATH_MODULES . "users.php";
      $tmp = "users";      
    break;
  }
 
} else {
  $tmp = "login"; 
}

require_once PATH_TMP . "main.php";

//EOF