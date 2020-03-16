<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])) {

    $page = $_GET['p'];

} else {

    $page = 'stories.index';
}

