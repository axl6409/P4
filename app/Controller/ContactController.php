<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class ContactController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    public function index() {
        $form = new BootstrapForm($_POST);
        $options = $this->Option->all();
        $optionImage = $this->OptionsImage->find($options[12]->value);
        $this->render('contact.index', compact('form', 'optionImage', 'options'));
    }
}
