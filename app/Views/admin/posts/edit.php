
<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
