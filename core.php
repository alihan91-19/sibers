<?php

// handle errors 
error_reporting(E_ALL & ~E_NOTICE); ini_set("display_errors", 1);

// database settings
define("DB_HOST", "localhost");
define("DB_NAME", "admin");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
 
// site url
define("URL_HOST", "http://localhost/task/");   

// folders' path
define("PATH_BASE", "/task/");

define("PATH_CONFIG", __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
define("PATH_MODULES", __DIR__ . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);
define("PATH_TMP", __DIR__  . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);

print_r (PATH_BASE);

// start session
session_start();

//calculating age
function getAge($date) {
  if ($date == "0000-00-00"){
    return;
  }
  $date = explode("-", $date);

  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $date[1], $date[2], $date[0]))) > date("md")
    ? ((date("Y") - $date[0]) - 1)
    : (date("Y") - $date[0]));
  return $age;
}

function getSex($sex){
  $s = ["undefined", "male", "female"];
  return $s[$sex];
}