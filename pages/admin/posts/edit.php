<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$postTable = App::getInstance()->getTable('Post');

if (!empty($_POST)) {
    $postTable->update($_GET['id'], [
            'title'     => $_POST['title'],
            'content'   => $_POST['content']
    ]);
}

$post = $postTable->find($_GET['id']);
$form = new BootstrapForm($post);

?>


<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
