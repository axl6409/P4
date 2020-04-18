<?php

namespace App\Controller\Admin;

use \App;
use \Core\Auth\DBAuth;

/**
 * Class AppController
 * @package App\Controller\Admin
 */
class AppController extends \App\Controller\AppController {

    /**
     * AppController constructor.
     * @uses App
     * @uses \Core\Auth\DBAuth
     */
    public function __construct() {
        parent::__construct();

        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }


}
