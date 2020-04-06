<h1>My Account</h1>

<?php if ($error) { ?>
    <?= $error; ?>
<?php } elseif (isset($start)) { ?>
    <?= $start; ?>
<?php } ?>

<div class="row">

    <div class="col-md-6">
        <form method="post" enctype="multipart/form-data">

            <?= $form->input('username', 'pseudo'); ?>

            <p>Changer le mot de passe :</p>
            <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
            <?= $form->input('cfpassword', 'vérifier le mot de passe', ['type' => 'password']); ?>

            <?= $form->input('mail', 'mail'); ?>

            <?php if (isset($user->image)) { ?>
                <div>
                    <img src="public/img/<?= $user->image ;?>" alt="">
                </div>
            <?php } ?>
            <?= $form->input('image', 'Image de profil', ['type' => 'file']); ?>

            <?= $form->submit('Sauvegarder'); ?>

        </form>
    </div>

</div>




