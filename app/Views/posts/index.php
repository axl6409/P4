

    <div class="row">
        <div class="col-sm-8">

            <?php foreach($posts as $post) : ?>

                <div class="post-container">
                    <h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

                    <p><?= $post->excerpt; ?></p>
                </div>

            <?php endforeach; ?>

        </div>

        <div class="col-sm-4">
            <ul>
            <?php foreach($comments as $comment) : ?>
                <li class="comment">

                    <img class="comment-avatar" src="public/img/<?= $comment->image ;?>" alt="">
                    <div class="comment-head">
                        <p class="comment-author"><?= $comment->user; ?></p>
                        <p class="comment-story">Post: <?= $comment->post; ?></p>
                    </div>
                    <div class="comment-body">
                        <p class="comment-text"><?= $comment->content; ?></p>
                    </div>

                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>



