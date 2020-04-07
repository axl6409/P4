
<?php if (!empty($postImage)) { ;?>
<div class="col-md-12 single-image">
    <img src="public/img/<?= $postImage->name ;?>" alt="">
</div>
<?php } ?>

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>

<?php if(isset($_SESSION['auth'])) { ?>

    <form method="post">
        <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
        <?= $form->submit('Envoyer'); ?>
    </form>

<?php }; ?>

<ul>
    <?php foreach($comments as $comment) : ?>
        <li>
            <div class="jumbotron">
                <p><?= $comment->user; ?></p>
                <hr class="my-4">
                <p><?= $comment->content; ?></p>
                <?php if(isset($_SESSION['auth'])) { ?>
                <form action="?p=posts.signal" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $comment->id; ?>">
                    <button type="submit" class="btn btn-danger">Signaler</button>
                </form>
                <?php }; ?>
            </div>

        </li>
    <?php endforeach; ?>
</ul>






