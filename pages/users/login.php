<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

if (!empty($_POST)) {
    $auth = new DBAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location: admin.php');
    } else {
        ?>
        <div class="alert alert-danger">
            Identifiants Incorrect
        </div>
        <?php
    }
}

$form = new BootstrapForm($_POST);

?>


<form method="post">
    <?= $form->input('username', 'pseudo'); ?>
    <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
