<div class="row">
    <div class="col-sm-8">

        <?php foreach(App::getInstance()->getTable('Post')->last() as $post) : ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

            <p><?= $post->excerpt; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach(App::getInstance()->getTable('Comment')->all() as $comment) : ?>
            <li>
                <p><?= $comment->content; ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>



