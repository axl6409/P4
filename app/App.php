<?php

// Class App - Variables & Stats

class App {


    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
    }
}