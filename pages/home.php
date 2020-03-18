

<?php foreach(\App\Table\Story::getLast() as $story) : ?>


    <h2><a href="<?= $story->url; ?>"><?= $story->title; ?></a></h2>

    <p><?= $story->excerpt; ?></p>


<?php endforeach; ?>

