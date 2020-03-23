<div class="row">
    <div class="col-sm-8">

        <?php foreach(App::getInstance()->getTable('Stories')->last() as $story) : ?>

            <h2><a href="<?= $story->url; ?>"><?= $story->title; ?></a></h2>

            <p><?= $story->excerpt; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach(\App\Table\Comments::all() as $comment) : ?>
            <li>
                <p><?= $comment->content; ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>



