<?php

if(isset($_POST["id"]) && (isset($_POST["email"]) || isset($_POST["name"]))) {
  $id = intval($_POST["id"]);
  // some data
  //$DB->exec("UPDATE `users`  ...  WHERE `id` = ?", [$id]);
  header("Location: /"); 
  exit();
} 
//EOF