
<?php if (isset($start)) {
    echo $start;
} ?>

<form method="post" enctype="multipart/form-data">
    <?php if (isset($post->image)) { ?>
        <div>
            <img src="public/img/<?= $post->image ;?>" alt="">
        </div>
    <?php } ?>
    <?= $form->input('image', 'Image à la une', ['type' => 'file']); ?>
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
