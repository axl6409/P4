
<?php if (!empty($postImage)) { ;?>
<div class="single-hero" style="background-image: url('public/img/<?= $postImage->name ;?>');"></div>
<?php } ?>

<div class="container single-container">
    <div class="row">

        <div class="col-md-12">
            <h1><?= $post->title; ?></h1>
            <p><?= $post->content; ?></p>

            <?php if(isset($_SESSION['auth'])) { ?>

                <form method="post">
                    <?= $form->input('content', 'Commentaire', ['type' => 'textarea']); ?>
                    <?= $form->submit('Envoyer'); ?>
                </form>

            <?php }; ?>

            <ul>
                <h2>Derniers Commentaires</h2>
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
        </div>

    </div>
</div>








