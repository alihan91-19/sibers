<?php 

if(isset($_POST["id"])) {
  $id = intval($_POST["id"]);
  $DB->exec("DELETE FROM `users` WHERE `id` = ?", [$id]);
  header("Location: /"); 
  exit();
} 

//EOF