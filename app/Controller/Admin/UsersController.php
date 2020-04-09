<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class UsersController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    public function index(){
        $users = $this->User->regUsers();
        $this->render('admin.users.index', compact('users'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->User->delete($_POST['id']);
            header('Location: index.php?p=admin.users.index');
        }

    }


}
