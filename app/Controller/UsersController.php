<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    public function login() {

        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));

    }

    public function signIn() {

        if (!empty($_POST)) {
            $result = $this->User->create([
                'username'  => $_POST['username'],
                'password'  => $_POST['password'],
                'email'     => $_POST['email']
            ]);

            if ($result) {
                return $this->index();
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form'));
    }

    public function logout() {
        if (!empty($_SESSION)) {
            unset($_SESSION['auth']);
            session_destroy();
            header('Location: index.php');
        }
    }
}