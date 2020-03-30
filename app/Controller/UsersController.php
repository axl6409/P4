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

        $errors = false;
        if (!empty($_POST)) {

            if ($_POST['password'] === $_POST['cfpassword']) {
                $password = sha1($_POST['password']);
                $auth = new DBAuth(App::getInstance()->getDb());
                $result = $auth->signIn([
                    'username'  => $_POST['username'],
                    'password'  => $password,
                    'mail'      => $_POST['mail'],
                    'role_id'      => '2'
                ]);
                if ($result) {
                    return $this->login($_POST['username'], $_POST['password']);
                }

            } else {
                $errors = true;
            }

        }

        $form = new BootstrapForm($_POST);
        $this->render('users.signIn', compact('form', 'errors'));
    }

    public function logout() {
        if (!empty($_SESSION)) {
            unset($_SESSION['auth']);
            session_destroy();
            header('Location: index.php');
        }
    }
}
