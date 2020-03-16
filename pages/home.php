

<?php foreach($db->query('SELECT * FROM stories', 'App\Table\Story') as $story) : ?>


    <h2><a href="<?php $story->getURL(); ?>"><?= $story->title; ?></a></h2>

    <p><?php $story->getExcerpt(); ?></p>


<?php endforeach; ?>

