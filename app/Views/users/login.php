
<div class="admin-container container">
    <div class="row">
        <div class="col-md-12">
            <?php if ($errors) { ?>
                <div class="badge-danger">
                    Identifiants Incorrects
                </div>
            <?php } ?>

            <h2 class="log-title">Connexion</h2>
            <form method="post" class="log-form">
                <?= $form->input('username', 'pseudo :'); ?>
                <?= $form->input('password', 'mot de passe :', ['type' => 'password']); ?>
                <?= $form->submit('Connexion'); ?>
            </form>

        </div>
    </div>
</div>




