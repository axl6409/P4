<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class HomeController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Option');
    }

    public function home() {
        $options = $this->Option->all();
        $this->render('home.index', compact('options'));
    }

}
