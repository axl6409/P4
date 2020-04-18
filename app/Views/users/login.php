
<div class="admin-container container">
    <div class="row">

        <div class="col-md-12">

            <h2 class="admin-title">Connexion</h2>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger col-md-12">
                    <?= $errors;?>
                </div>
                <?php endif; ?>

            <form method="post" class="log-form">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <?= $form->input('username', 'pseudo :'); ?>
                <?= $form->input('password', 'mot de passe :', ['type' => 'password']); ?>
                <?= $form->submit('Connexion'); ?>
            </form>
        </div>

    </div>
</div>




