<!--
 -- Public ****************
 -- Login page
 -->

<div class="admin-container container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <div class="col-md-12">

            <!-- Main Title -->
            <h1 class="admin-title">Connexion</h1>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger col-md-12">
                    <?= $errors;?>
                </div>
                <?php endif; ?>

            <form method="post" class="log-form">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <?= $form->input('username', 'pseudo :', '', true); ?>
                <?= $form->input('password', 'mot de passe :', ['type' => 'password'], true); ?>
                <?= $form->submit('Connexion'); ?>
            </form>
        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->




