<!--
 -- Public ****************
 -- Sign In page
 -->

<div class="admin-container container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <div class="col-md-12">

            <!-- Main Title -->
            <h1 class="admin-title">Inscription</h1>

            <?php if (array_key_exists('errors', $_SESSION)) : ?>
                <div class="alert alert-danger col-md-12">
                    <?= implode('<br>', $_SESSION['errors']);?>
                </div>
                <?php unset($_SESSION['errors']);endif; ?>

            <form method="post" class="log-form" action="index.php?p=users.register">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <?= $form->input('username', 'pseudo','', true); ?>
                <?= $form->input('password', 'mot de passe', ['type' => 'password'], true); ?>
                <?= $form->input('cfpassword', 'confirmer le mot de passe', ['type' => 'password'], true); ?>
                <?= $form->input('mail', 'mail','', true); ?>
                <button class="btn btn-primary">Envoyer</button>
            </form>

        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->
