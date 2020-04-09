<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class HomeController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    public function home() {
        $options = $this->Option->all();
        $heroImage = $this->OptionsImage->find($options[0]->value);
        $bioImage = $this->OptionsImage->find($options[5]->value);
        $romanImage = $this->OptionsImage->find($options[9]->value);
        $this->render('home.index', compact('options', 'heroImage', 'bioImage','romanImage'));
    }

}
