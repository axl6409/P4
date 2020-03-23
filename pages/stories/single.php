<?php

use App\App;
use App\Table\Comments;
use App\Table\Stories;

$story = Stories::find($_GET['id']);
if($story === false) {
    App::notFound();
}

App::setTitle($story->title);

?>

<h1><?= $story->title; ?></h1>
<p><?= $story->content; ?></p>


