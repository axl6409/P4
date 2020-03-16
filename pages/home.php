<?php

$db = new App\Database('jeanforteroche');
$datas = $db->query('SELECT * FROM stories');
var_dump($datas);
