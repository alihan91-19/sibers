<?php

//edit user 
$err = "";

//get user from DB
$user = $DB->fetch("SELECT * FROM `users` WHERE `id` = ?", [$id]);
  if($user) {
    $data = [
      "login" => $user["login"],
      "lastname" => $user["lastname"],
      "firstname" => $user["firstname"],
      "sex" => $user["sex"],
      "birthday" => date("Y-m-d", strtotime($user["birthday"])),
      "id" => $user["id"],
      "isAdmin" => $user["isAdmin"]
    ]; 
  }

if(!empty($_POST["id"]) && !empty($_POST["login"]) && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["password"]) && isset($_POST["sex"]) && !empty($_POST["birthday"])) {
    
  $message = "";
  $data = [
    "login" => trim(addslashes(strip_tags($_POST["login"]))),
    "lastname" => trim(addslashes(strip_tags($_POST["lastname"]))),
    "firstname" => trim(addslashes(strip_tags($_POST["firstname"]))),
    "password" => password_hash($_POST['password'], PASSWORD_BCRYPT),
    "sex" => intval($_POST["sex"]),
    "birthday" => date("Y-m-d", strtotime($_POST["birthday"])),
    "isAdmin" => intval($_POST["isAdmin"]),
    "id" => intval($_POST["id"])
  ];

  //check if login is unique
  $user = $DB->fetch("SELECT `id` FROM `users` WHERE `login` = ? && `id` != ?", [$data["login"], $data["id"]]);
  if($user) {
    $err = "Этот логин занят";
    return;
  }

  //update user
  $result = $DB->exec("UPDATE `users` SET `login` = ?, `lastname` = ?, `firstname` = ?, `password` = ?, `sex` = ?, `birthday` = ?, `isAdmin` = ?, `updated_at` = now() WHERE `id` = ?", array_values($data));
  if($result) {
    $message = "Данные обновленны. Вы будете перенаправлены на главную страницу через 5 секунд";
    unset($data);
    header("refresh: 5; url=" . URL_HOST);
  }
    
}

//EOF