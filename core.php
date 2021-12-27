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
define("PATH_CONFIG", __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
define("PATH_MODULES", __DIR__ . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);
define("PATH_TMP", __DIR__  . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);


// start session
session_start();