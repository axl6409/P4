<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;
use Core\HTML\Upload;

/**
 * Class UsersController
 * @package App\Controller
 */
class UsersController extends AppController {

    /**
     * UsersController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    /**
     * Login function for users
     * Use DBAuth login function
     * Crypt POST password with SHA1
     * Then check user logged
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\Auth\DBAuth
     */
    public function login() {

        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            $password = sha1($_POST['password']);
            if ($auth->login($_POST['username'], $password)) {
                if ($auth->logged()) {
                    header('Location: index.php?p=admin.posts.index');
                } else {
                    header('Location: index.php');
                }

            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));

    }

    /**
     * Sign in new Users
     * Use DBAuth SignIn function
     * Crypt POST password with SHA1
     * Then use login function
     * @uses \Core\Auth\DBAuth
     * @uses \Core\HTML\BootstrapForm
     */
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

    /**
     * Logout a user by unset & destroy the SESSION
     * Then return location to Homepage
     */
    public function logout() {
        if (!empty($_SESSION)) {
            unset($_SESSION);
            session_destroy();
            header('Location: index.php');
        }
    }

    /**
     * Display Users page where can be find his informations
     * @uses \App\Table\UserTable
     */
    public function index() {
        $user = $this->User->find($_SESSION['auth']);
        $this->render('users.index', compact('user'));
    }

    /**
     * Let a user update his informations | Let the user to be able to change an profil picture
     * @uses \App\Table\UserTable
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\HTML\Upload
     * @return bool|string|void
     */
    public function update() {

        $error = false;
        $user = $this->User->find($_SESSION['auth']);
        $form = new BootstrapForm($user);
        $upload = new Upload();

        if (!empty($_POST)) {

            if ($_FILES['image']['error'] === 0) {

                $start = $upload->startUpload();

                if ($upload->uploadOk === false) {

                    $this->render('users.update', compact('user', 'form', 'start', 'error'));
                    return $start;

                } elseif ($upload->uploadOk === true) {

                    $result = $this->User->update($_GET['id'], [
                        'image' => $_FILES['image']['name']
                    ]);

                    if ($result) {
                        return $this->index();
                    }

                }

            } elseif ($_FILES['image']['error'] === 4) {

                if (!empty($_POST['password']) && empty($_POST['cfpassword'])) {

                    $error = "Le champs de confirmation du mot de passe n'est pas remplis";
                    return $error;

                } elseif (!empty($_POST['password']) && !empty($_POST['cfpassword'])) {

                    if ($_POST['password'] != $_POST['cfpassword']) {

                        $error = "Les champs de mot de passe sont différents";
                        return $error;

                    }

                    $password = sha1($_POST['password']);

                    $result = $this->User->update($_GET['id'], [
                       'password'   => $password
                    ]);

                    if ($result) {
                        return $this->index();
                    }

                } elseif (empty($_POST['password']) && empty($_POST['cfpassword'])) {

                    $result = $this->User->update($_GET['id'], [
                        'username'   => $_POST['username'],
                        'mail'       => $_POST['mail']
                    ]);

                    if ($result) {
                        return $this->index();
                    }

                }

            }

        }
        $this->render('users.update', compact('user', 'form', 'error'));
    }
}
