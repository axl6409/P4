<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

var_dump(App\Config::getInstance()->get('db_user'));
