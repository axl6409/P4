<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$post = App::getInstance()->getTable('Post')->find($_GET['id']);

$form = new BootstrapForm($post);

?>


<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
