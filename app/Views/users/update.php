<!--
 -- Public ****************
 -- Update Users Infos
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <!-- Main Title -->
        <h1 class="admin-title">Modifier vos informations</h1>

        <?php if ($error) { ?>
            <?= $error; ?>
        <?php } elseif (isset($start)) { ?>
            <?= $start; ?>
        <?php } ?>


        <div class="col-md-12">

            <form method="post" enctype="multipart/form-data">

                <div class="user-form-section">
                    <p>Changer les informations :</p>
                    <?= $form->input('username', 'pseudo'); ?>
                    <?= $form->input('mail', 'mail'); ?>
                </div>
                <div class="user-form-section">
                    <p>Changer le mot de passe :</p>
                    <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
                    <?= $form->input('cfpassword', 'vérifier le mot de passe', ['type' => 'password']); ?>
                </div>

                <div class="user-update-img">
                    <?php if (isset($user->image)) { ?>
                        <div class="user-update-img-container">
                            <img src="public/img/<?= $user->image ;?>" alt="">
                        </div>
                    <?php } ?>
                    <div class="user-update-img-field">
                        <?= $form->input('image', 'Image de profil', ['type' => 'file']); ?>
                    </div>
                </div>

                <div class="user-update-submit">
                    <?= $form->submit('Sauvegarder'); ?>
                </div>

            </form>

        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->





