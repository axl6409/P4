
<?php if (!empty($postImage)) { ;?>
<div class="hero" style="background-image: url('public/img/<?= $postImage->name ;?>');">
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1><?= $post->title; ?></h1>
    </div>
</div>
<?php } ?>

<div class="container single-container">
    <div class="row">

        <div class="col-md-12">
            <div class="single-content">
                <p><?= $post->content; ?></p>
            </div>

            <div class="single-comment">
                <button class="btn btn-outline-primary" id="newComment">
                    Ajouter un commentaire
                </button>
            </div>


            <?php if(isset($_SESSION['auth'])) { ?>
            <div class="new-comment" id="commentForm">
                <form method="post">
                    <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']); ?>
                    <?= $form->submit('Envoyer'); ?>
                </form>
            </div>
            <?php } else { ?>
                <p class="new-comment" id="commentForm" style="text-align: center">Vous devez avoir un compte pour pouvoir poster un commentaire.</p>
            <?php } ?>
            <div class="lasts-comments">
                <ul>
                    <h2 class="lasts-comments-title">Derniers Commentaires</h2>
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
</div>








