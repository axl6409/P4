
<form method="post" enctype="multipart/form-data">
    <?= $form->select('image', 'Image à la une', $images); ?>
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
