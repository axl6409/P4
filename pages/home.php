

<?php foreach(App\App::getDb()->query('SELECT * FROM stories', 'App\Table\Story') as $story) : ?>


    <h2><a href="<?= $story->url; ?>"><?= $story->title; ?></a></h2>

    <p><?= $story->excerpt; ?></p>


<?php endforeach; ?>

