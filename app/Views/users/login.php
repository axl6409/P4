<?php if ($errors): ?>
    <div class="alert alert-danger">
        Identifiants Incorrects
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('username', 'pseudo'); ?>
    <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
