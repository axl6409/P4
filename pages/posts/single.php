<?php

$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);

if($post === false) {

    $app->notFound();

}

$app->title = $post->title;

?>

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>

<ul>
    <?php foreach(App::getInstance()->getTable('Comment')->lastByStory($_GET['id']) as $comment) : ?>

        <li>
            <p><?php $comment->content; ?></p>
        </li>

    <?php endforeach; ?>

</ul>


