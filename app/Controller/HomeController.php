<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class HomeController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Option');
        $this->loadModel('Image');
    }

    public function home() {
        $options = $this->Option->all();
        $heroImage = $this->Image->find($options[0]->value);
        $bioImage = $this->Image->find($options[6]->value);
        $romanImage = $this->Image->find($options[10]->value);
        $this->render('home.index', compact('options', 'heroImage', 'bioImage','romanImage'));
    }

}
