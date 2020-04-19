<?php
namespace Core;
/**
 * Class Autoloader
 * @package Tutoriel
 */
class Autoloader{
    
    /**
     * Register the Autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Include the file that matches with class
     * @param $class string Name of Class to load
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }

}
