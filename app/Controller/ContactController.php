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

        if (!empty($_POST)) {

            if (isset($_POST['g-recaptcha-response'])) {
                $captcha = $_POST['g-recaptcha-response'];
            } else {
                $captcha = false;
            }

            if (!$captcha) {

                //Do something with error
                $msg = "Il y à une erreur avec le captcha !";

            } else {

                $secret   = '6Lf1pegUAAAAALM7wcTH5IB2rhzmj1_0yf8pFJtP';
                $response = file_get_contents(
                    "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
                );
                // use json_decode to extract json response
                $response = json_decode($response);

                if ($response->success === false) {
                    $msg = "You're a Robot !";
                }
            }

            //... The Captcha is valid you can continue with the rest of your code
            //... Add code to filter access using $response . score
            if ($response->success == true && $response->score <= 0.5) {
                $msg = "Vous n'êtes pas un Robot ! </br> Votre message est validé et envoyé!";
            }

        }

        if (isset($msg)) {
            $this->render('contact.index', compact('form', 'optionImage', 'options', 'msg'));
        } else {
            $this->render('contact.index', compact('form', 'optionImage', 'options'));
        }

    }

    public function send() {

        $errors = [];

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
            $to      = 'alexandre.celier64@gmail.com';
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
