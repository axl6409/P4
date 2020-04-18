
<div class="admin-container container">
    <div class="row">

        <div class="col-md-12">

            <h2 class="admin-title">Connexion</h2>

            <?php if ($errors) { ?>
                <div class="badge-danger">
                    Identifiants Incorrects
                </div>
            <?php } ?>

            <form method="post" class="log-form">
                <?= $form->input('username', 'pseudo :'); ?>
                <?= $form->input('password', 'mot de passe :', ['type' => 'password']); ?>
                <?= $form->submit('Connexion'); ?>
            </form>
        </div>

    </div>
</div>




