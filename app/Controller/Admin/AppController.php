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
     * Use logged functin in DBAuth
     * Use forbidden function if not logged
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
