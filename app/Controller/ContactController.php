<?php

namespace App\Controller;

use \App;
use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class ContactController
 * @package App\Controller
 */
class ContactController extends AppController {


    /**
     * ContactController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    /**
     * Main page for Contact
     * Generate a form with BootstrapForm | Display options values | Display Image set in options | Manage ReCaptcha V3
     * @uses \App\Table\OptionTable
     * @uses \Core\HTML\BootstrapForm
     * @uses \App\Table\OptionsImageTable
     */
    public function index() {
        $form = new BootstrapForm($_POST);
        $options = $this->Option->all();
        $optionImage = $this->OptionsImage->find($options[12]->value);

        $this->render('contact.index', compact('form', 'optionImage', 'options'));

    }

    /**
     * Send the email before check if all fields are set and valid
     * Return errors in $_SESSION
     * @uses \App\Controller\UsersController
     */
    public function send() {

        $users = $this->User->find(1);
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
                    $errors['captcha'] = "You're a Robot !";
                }
            }

            //... The Captcha is valid you can continue with the rest of your code
            //... Add code to filter access using $response . score
            if ($response->success == true && $response->score <= 0.5) {
                $errors['captcha'] = "Vous n'êtes pas un Robot !";
            }

            if (!array_key_exists('name', $_POST) || $_POST['name'] == '') {
                $errors['name'] = "Vous n'avez pas renseigné votre nom";
            }
            if (!array_key_exists('firstname', $_POST) || $_POST['firstname'] == '') {
                $errors['firstname'] = "Vous n'avez pas renseigné votre firstname";
            }
            if (!array_key_exists('mail', $_POST) || $_POST['mail'] == '') {
                $errors['mail'] = "Vous n'avez pas renseigné votre email";
            } elseif(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) {
                $errors['mail'] = "Vous n'avez pas renseigné un email valide";
            }
            if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
                $errors['message'] = "Vous n'avez pas renseigné votre message";
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?p=contact.index');
            } else {
                $to      = $users->mail;
                $subject = 'Contact depuis le site JeanForteroche';
                $message = $_POST['message'];
                $headers = 'From: '.$_POST['mail'].'' . "\r\n" .
                    'Reply-To: '.$_POST['mail'].'' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
                $errors['success'] = "Votre message à bien été envoyé ! Merci";
                $_SESSION['errors'] = $errors;
                header('Location: index.php?p=contact.index');
            }

        }

    }
}
