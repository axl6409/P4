

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>

<ul>
    <?php foreach($comments as $comment) : ?>
        <li>
            <div class="comment-infos">
                <p><?= $comment->user; ?></p>
                <p><?= $comment->content; ?></p>
                <form action="?p=posts.signal" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $comment->id; ?>">
                    <button type="submit" class="btn btn-danger">Signaler</button>
                </form>
            </div>

        </li>
    <?php endforeach; ?>
</ul>

<?php if(isset($_SESSION['auth'])) { ?>

<form method="post">
    <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
    <?= $form->submit(); ?>
</form>

<?php }; ?>




