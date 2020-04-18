<!--
 -- Public ****************
 -- Single Post page
 -->

<?php if (!empty($postImage)) { ;?>
<div class="hero" style="background-image: url('public/img/<?= $postImage->name ;?>');"> <!-- Hero -->
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1><?= $post->title; ?></h1>
    </div>
</div> <!-- End Row -->
<?php } ?>

<div class="container single-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <div class="col-md-12">

            <!-- Post Content -->
            <div class="single-content">
                <p><?= $post->content; ?></p>
            </div>
            <!-- End Post Content -->

            <!-- New Comment -->
            <div class="single-comment">
                <button class="btn btn-outline-primary" id="newComment">
                    Ajouter un commentaire
                </button>
            </div>

            <?php if(isset($_SESSION['auth'])) { ?>
            <div class="new-comment" id="commentForm">
                <form method="post">
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <input type="hidden" name="action" value="validate_captcha">
                    <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']); ?>
                    <?= $form->submit('Envoyer'); ?>
                </form>
            </div>
            <?php } else { ?>
                <p class="new-comment" id="commentForm" style="text-align: center">Vous devez avoir un compte pour pouvoir poster un commentaire.</p>
            <?php } ?>
            <!-- End New Comment -->

            <!-- Post Comments -->
            <div class="lasts-comments">
                <ul>
                    <h2 class="lasts-comments-title">Derniers Commentaires</h2>
                    <?php foreach($comments as $comment) : ?>
                        <li>
                            <div class="jumbotron single-comments">
                                <div class="comment-user">
                                    <?php $userImage = $this->User->find($comment->user_id) ?>
                                    <?php if (isset($userImage->image)) { ?>
                                    <div class="comment-avatar">
                                        <img src="public/img/<?= $userImage->image ;?>" alt="image de profil de l'utilisateur">
                                    </div>
                                    <?php } ?>
                                    <div class="comment-user-infos">
                                        <p><?= $comment->user; ?></p>
                                        <div class="comment-date"><?= $comment->date;?></div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <p><?= $comment->content; ?></p>
                                <?php if(isset($_SESSION['auth'])) { ?>
                                    <form action="?p=posts.signal" class="single-comments-signal" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $comment->id; ?>">
                                        <button type="submit" class="btn btn-danger">Signaler</button>
                                    </form>
                                <?php }; ?>
                            </div>

                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- End Post Comments -->

        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->








