<?php

$comment = \App\Table\Comments::find($_GET['id']);
$stories = \App\Table\Stories::lastByCategory($_get['id']);
$comments = Comment::all();

?>