<div class="row">
    <div class="col-sm-8">

        <?php foreach(\App\Table\Stories::getLast() as $story) : ?>

            <h2><a href="<?= $story->url; ?>"><?= $story->title; ?></a></h2>

            <p><?= $story->excerpt; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach(\App\Table\Comment::all() as $comment) : ?>
            <li>
                <a href="<?= $comment->url; ?>"><p><?= $comment->content; ?></p></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>



