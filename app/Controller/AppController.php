<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController
 * @package App\Controller
 */
class AppController extends Controller {

    protected $template = 'default';

    /**
     * AppController constructor.
     */
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Load the Table model
     * @param $model_name
     */
    protected function loadModel($model_name) {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    protected function loadCaptchaKey() {
        App::getInstance()->getCaptchaKey();
    }
}
