<?php
$story = App\App::getDb()->prepare('SELECT * FROM stories WHERE id = ?', [$_GET['id']], 'App\Table\Story', true);

?>

<h1><?= $story->title; ?></h1>
<p><?= $story->content; ?></p>