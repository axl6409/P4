<?php

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

$postTable = App::getInstance()->getTable('Post');

if (!empty($_POST)) {
    $result = $postTable->create([
        'title'     => $_POST['title'],
        'content'   => $_POST['content']
    ]);

    if ($result) {
        header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}

$form = new BootstrapForm($_POST);

?>


<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
