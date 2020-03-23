<?php

namespace App;

class App {

    const DB_NAME = 'jeanforteroche';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private static $title = "Jean Forteroche";
    private static $database;

    public static function getDb() {
        if( self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    public static function notFound(){
        header('HTTTP/1.0 404 Not Found');
        header('Location:index.php?p=404');
    }
    

    public static function getTitle() {
        return self::$title;
    }


    public static function setTitle($title) {
        self::$title = $title . ' | ' . self::$title;
    }
}