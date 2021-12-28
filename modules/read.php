<?php

//show user by id
$err = "";

$user = $DB->fetch("SELECT * FROM `users` WHERE `id` = ?", [$id]);
  if($user) {
    $data = "
    <div class='list-group list-group-flush'>
      <p class='list-group-item'>Login: {$user["login"]}</p>
      <p class='list-group-item'>Name: {$user["firstname"]} {$user["lastname"]}</p>
      <p class='list-group-item'>Age: " . getAge($user["birthday"]) . "</p>
      <p class='list-group-item'>Sex: " . getSex($user["sex"]) . "</p>
      <p class='list-group-item'>Admin: " . ($user["isAdmin"]?"yes":"no") . "</p>
    </div>";
  } else{
    $data = "Нет такого пользователя";
  }

  //EOF