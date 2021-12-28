<?php
//add new user
$err = "";

if(!empty($_POST["login"]) && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["password"]) && isset($_POST["sex"]) && !empty($_POST["birthday"])) {
  
  $message = "";
  $data = [
    "login" => trim(addslashes(strip_tags($_POST["login"]))),
    "lastname" => trim(addslashes(strip_tags($_POST["lastname"]))),
    "firstname" => trim(addslashes(strip_tags($_POST["firstname"]))),
    "password" => password_hash($_POST['password'], PASSWORD_BCRYPT),
    "sex" => intval($_POST["sex"]),
    "birthday" => date("Y-m-d", strtotime($_POST["birthday"])),
    "isAdmin" => intval($_POST["isAdmin"]),
  ];

  //check if login is unique
  $user = $DB->fetch("SELECT `id` FROM `users` WHERE `login` = ?", [$data["login"]]);
  if($user) {
    $err = "Пользователь с таким логином существует";
    return;
  }

  //insert data
  $result = $DB->exec("INSERT INTO `users` (`login`, `lastname`, `firstname`, `password`, `sex`, `birthday`, `isAdmin`, `created_at`) VALUES (?,?,?,?,?,?,?,now())", array_values($data));
  if($result) {
    $message = "Пользователь добавлен. Вы будете перенаправлены на главную страницу через 5 секунд";
    unset($data);
    header("refresh: 5; url=" . URL_HOST);
  }
    

} else {
  $err = "Заполните все поля";
}

//EOF