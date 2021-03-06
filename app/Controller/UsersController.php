<?php

namespace App\Controller;

use Cassandra\Index;
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
     * Manage login page
     * Use recaptcha
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\Auth\DBAuth
     */
    public function login() {

        $captchaKey = require(ROOT . '/config/captcha.php');
        $errors = "";
        if (!empty($_POST)) {

            if (isset($_POST['g-recaptcha-response'])) {
                $captcha = $_POST['g-recaptcha-response'];
            } else {
                $captcha = false;
            }

            if (!$captcha) {

                //Do something with error
                $errors = "Il y à une erreur avec le captcha !";

            } else {

                $secret   = $captchaKey;
                $response = file_get_contents(
                    "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
                );
                // use json_decode to extract json response
                $response = json_decode($response);

                if ($response->success === false) {
                    $errors = "You're a Robot !";
                }
            }

            //... The Captcha is valid you can continue with the rest of your code
            //... Add code to filter access using $response . score
            if ($response->success == true) {

                $auth = new DBAuth(App::getInstance()->getDb());
                $password = sha1($_POST['password']);
                if ($auth->login($_POST['username'], $password)) {
                    if ($auth->logged()) {
                        header('Location: index.php?p=admin.posts.index');
                    } else {
                        header('Location: index.php');
                    }

                } else {
                    $errors = "Vos identifiants sont incorrects";
                }

            }
        }

        $form = new BootstrapForm();
        $this->render('users.login', compact('form', 'errors'));

    }

    /**
     * Manage SignIn page
     * @uses \Core\HTML\BootstrapForm
     */
    public function signIn() {
        $form = new BootstrapForm();
        $this->render('users.signIn', compact('form'));
    }

    /**
     * Register a new user
     * Use recaptcha
     * @uses \Core\Auth\DBAuth
     * @uses \Core\HTML\BootstrapForm
     */
    public function register() {

        $captchaKey = require(ROOT . '/config/captcha.php');
        $errors = [];

        if (!empty($_POST)) {

            if (isset($_POST['g-recaptcha-response'])) {
                $captcha = $_POST['g-recaptcha-response'];
            } else {
                $captcha = false;
            }

            if (!$captcha) {

                //Do something with error
                $errors['captcha'] = "Il y à une erreur avec le captcha !";

            } else {

                $secret   = $captchaKey;
                $response = file_get_contents(
                    "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
                );
                // use json_decode to extract json response
                $response = json_decode($response);

                if ($response->success === false) {
                    $errors['captcha'] = var_dump($response);
                }
            }

            //... The Captcha is valid you can continue with the rest of your code
            //... Add code to filter access using $response . score
            if ($response->success == true && $response->score <= 0.9) {

                $username = $_POST['username'];
                if (!preg_match("/^[0-9a-zA-Z ]*$/",$username)) { //si c'est pas un mot
                    $errors['username'] = "Uniquement des chiffres et lettres sont acceptés pour le pseudo";
                }

                if ($userExists = $this->User->findByName($username)) {
                    if ($userExists->username == $username) {
                        $errors['username'] = "Ce pseudo existe déjà, veuillez en choisir un autre";
                    }
                }

                if ($_POST['password'] !== $_POST['cfpassword']) {
                    $errors['password'] = "Les champs de mot de passe sont differents";
                }

                if (!array_key_exists('mail', $_POST) || $_POST['mail'] == '') {
                    $errors['mail'] = "Vous n'avez pas renseigné votre email";
                } elseif(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) {
                    $errors['mail'] = "Vous n'avez pas renseigné un email valide";
                }

                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    header('Location: index.php?p=users.signIn');
                } else {
                    $password = sha1($_POST['password']);
                    $auth = new DBAuth(App::getInstance()->getDb());
                    $result = $auth->signIn([
                        'username'  => $username,
                        'password'  => $password,
                        'mail'      => $_POST['mail'],
                        'role_id'      => '2'
                    ]);
                    if ($result) {
                        header('Location: index.php?p=users.login');
                    }
                }
            }
        }

    }

    /**
     * Logout the user | And unset & destroy the SESSION
     */
    public function logout() {
        if (!empty($_SESSION)) {
            unset($_SESSION);
            session_destroy();
            header('Location: index.php');
        }
    }

    /**
     * Manage the main page for user account
     * Display informations of the user
     * @uses \App\Table\UserTable
     */
    public function index() {
        if (!isset($_SESSION['auth'])) {
            header('Location: index.php?p=users.login');
        } else {
            $user = $this->User->find($_SESSION['auth']);
            $this->render('users.index', compact('user'));
        }
    }

    /**
     * Manage the update page for the user informations
     * Use the Upload class for user Image
     * @uses \App\Table\UserTable
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\HTML\Upload
     * @return bool|string|void
     */
    public function update() {

        if(!isset($_SESSION['auth'])) {
            header('Location: index.php?p=users.login');
        } else {
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
}
