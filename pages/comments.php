<?php

$comment = \App\Table\Comment::find($_GET['id']);
$stories = \App\Table\Stories::lastByCategory($_get['id']);
$comments = Comment::all();

?>