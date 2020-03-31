
<?php if ($errors) { ?>
    <div class="badge-danger">
        Identifiants Incorrects
    </div>
<?php } ?>

<h2>Connexion</h2>
<form method="post">
    <?= $form->input('username', 'pseudo'); ?>
    <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
    <?= $form->submit(); ?>
</form>



