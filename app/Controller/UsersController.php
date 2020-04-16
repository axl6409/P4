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

        $form = new BootstrapForm();
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

        $errors = [];

        if (!empty($_POST)) {

            /*
             * Check if username field is set || Check if is not max 20 caract
             */
            if (!array_key_exists('username', $_POST) || $_POST['username'] == "") {
                $errors['username'] = "Vous n'avez pas inséré votre pseudo";
            } elseif (strlen($_POST['username']) >= 20) {
                $errors['username'] = "Votre pseudo est trop long";
            }

            /**
             * Check if password field is set || Check if password an cfpassword are not different
             */
            if (!array_key_exists('password', $_POST) || $_POST['password'] == "" &&
                !array_key_exists('cfpassword', $_POST) || $_POST['cfpassword'] == "") {
                $errors['password'] = "Vous n'avez pas inseré de mot de passe";
            } elseif ($_POST['password'] != $_POST['cfpassword']) {
                $errors['password'] = "Les champs de mot de passe sont differents";
            }

            /**
             * Check if mail field is set || Check if mail is in the right format
             */
            if (!array_key_exists('mail', $_POST) || $_POST['mail'] == "") {
                $errors['mail'] = "Vous n'avez pas inseré votre mail";
            } elseif(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) {
                $errors['mail'] = "Votre mail n'est pas valide";
            }

            $pseudo = htmlspecialchars($_POST['username'], ENT_QUOTES); // Convert special chart and quotes
            $password = sha1($_POST['password']); // Convert password to SHA1

            /**
             * If there some errors, displays them in the SESSION
             * Else Register a new user
             */
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?p=users.login');
            } else {
                $auth = new DBAuth(App::getInstance()->getDb());
                $result = $auth->signIn([
                    'username'  => $pseudo,
                    'password'  => $password,
                    'mail'      => $_POST['mail'],
                    'role_id'      => '2'
                ]);
                if ($result) {
                    return $this->login($_POST['username'], $_POST['password']);
                }
            }

        }
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
