

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
                <li class="jumbotron">
                    <div class="comment-infos">

                        <div class="com-user-image">
                            <img src="public/img/<?= $comment->image ;?>" alt="">
                        </div>
                        <p class="com-user">User: <?= $comment->user; ?></p>
                        <p class="com-post">Post: <?= $comment->post; ?></p>

                    </div>

                    <p><?= $comment->content; ?></p>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>



