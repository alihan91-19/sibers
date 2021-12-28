<?php

require_once "./core.php";

$isLogin = false;

if (isset($_GET["logout"])){
  unset($_SESSION["user"]);
}

if(isset($_SESSION["user"]["id"])) {
  $isLogin = true;
} else {
  //auth
  if (isset($_POST['password']) && isset($_POST['login'])) {
    require_once PATH_CONFIG . "database.php";
    $DB = new DB();
      $user = $DB->fetch(
        "SELECT * FROM `users` WHERE `login`=? && `isAdmin` = 1", [trim(addslashes(strip_tags($_POST["login"])))]
      );
      if(is_array($user)) {
        $pass = password_verify($_POST["password"], $user["password"]);
        if ($pass){
          $_SESSION["user"]["id"] = $user["id"];
          header("Location: " . PATH_BASE);
        } else {
          $err = "Password is incorrect";
        }
        
      } else {
        $err = "Login is incorrect";
      }
  
  }
}

if($isLogin) {
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