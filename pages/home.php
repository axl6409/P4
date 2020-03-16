

<?php foreach($db->query('SELECT * FROM stories', 'App\Table\Story') as $story) : ?>


    <h2><a href="<?= $story->getURL(); ?>"><?= $story->title; ?></a></h2>

    <p><?= $story->getExcerpt(); ?></p>


<?php endforeach; ?>

