<?php

$posts = App::getInstance()->getTable('Post')->all();


?>


<h1>Administrer les Histoires</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($posts as $post) : ?>
        <tr>
            <td>
                <?= $post->id; ?>
            </td>
            <td>
                <?= $post->title; ?>
            </td>
            <td>
                <a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->id; ?>">Éditer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>