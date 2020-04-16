
<div class="admin-container container">
    <div class="row">

        <div class="col-md-6">

            <h2 class="log-title">Connexion</h2>

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
        
        <div class="col-md-6">
            <h2 class="admin-title">Inscription</h2>

            <?php if (array_key_exists('errors', $_SESSION)) : ?>
                <div class="badge-danger">
                    <?= implode('<br>', $_SESSION['errors']);?>
                </div>
                <?php unset($_SESSION['errors']);endif; ?>

            <form method="post" action="index.php?p=users.signIn">
                <?= $form->input('username', 'pseudo','', true); ?>
                <?= $form->input('password', 'mot de passe', ['type' => 'password'], true); ?>
                <?= $form->input('cfpassword', 'confirmer le mot de passe', ['type' => 'password'], true); ?>
                <?= $form->input('mail', 'mail','', true); ?>
                <button class="btn btn-primary">Envoyer</button>
            </form>
        </div>

    </div>
</div>




