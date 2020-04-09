
<div class="admin-container container">
    <div class="row">
        <div class="col-md-12">

            <?php if ($errors) { ?>
                <div class="badge-danger">
                    Identifiants Incorrects
                </div>
            <?php } ?>

            <h2>Inscription</h2>
            <form method="post">
                <?= $form->input('username', 'pseudo'); ?>
                <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
                <?= $form->input('cfpassword', 'confirmer le mot de passe', ['type' => 'password']); ?>
                <?= $form->input('mail', 'mail'); ?>
                <button class="btn btn-primary">Envoyer</button>
            </form>

        </div>
    </div>
</div>
