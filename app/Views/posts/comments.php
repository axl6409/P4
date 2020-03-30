<?php

$comment = \App\Table\Comment::find($_GET['id']);
$post = \App\Table\Stories::lastByCategory($_get['id']);

?>
