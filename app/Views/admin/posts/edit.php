
<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'editor']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
