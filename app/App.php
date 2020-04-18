<?php

use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * Class App
 */
class App {

    /**
     * Titre du Site
     * @var string
     */
    public $title = "Jean Forteroche";
    /**
     * Instance of the DB
     * @var array
     */
    private $db_instance;
    /**
     * Singleton
     * @var self
     */
    private static $_instance;

    /**
     * GetInstance
     * Singleton
     * @return App
     */
    public static function getInstance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    /**
     * Load the Autoloader of Core & App
     */
    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();

    }

    /**
     * Get Table with name
     * @param $name
     * @return mixed
     */
    public function getTable($name) {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    /**
     * Get Database & pass DB configuration | Use Config file
     * Singleton
     * @return array|MysqlDatabase
     */
    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}
