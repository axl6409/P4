<div class="row">
    <div class="col-sm-8">

        <?php foreach($posts as $post) : ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

            <p><?= $post->excerpt; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach($comments as $comment) : ?>
            <li>
                <p><?= $comment->post; ?></p>
                <h2><?= $comment->user; ?></h2>
                <p><?= $comment->content; ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>



