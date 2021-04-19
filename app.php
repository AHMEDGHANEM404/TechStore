<?php
// paths
define("PATH", __DIR__ . "/");
define("URL", "http://localhost/TechStore/");

// DB
define("SERVER_NAME", "localhost");
define("DB_USER_NEME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "workshop2");

require_once(PATH ."vendor/autoload.php");
use TechStore\Classes\Request;
use TechStore\Classes\Session;
// use TechStore\Classes\Validation\Validator;
// require_once("Classes/Validation/Validator.php");


$request = new Request;
$session = new Session;
// $validator= new Validator;
// echo $request->get('name');


