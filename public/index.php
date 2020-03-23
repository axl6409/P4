<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\App::getInstance();

$stories = $app->getTable('Stories');
var_dump($stories->all());



