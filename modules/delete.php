<?php 

if(isset($_GET["id"])) {
  print "Deleting...";
  $id = intval($_GET["id"]);
  $result = $DB->exec("DELETE FROM `users` WHERE `id` = ?", [$id]);
  header("refresh: 0; url=" . URL_HOST); 
  exit;
} 

//EOF