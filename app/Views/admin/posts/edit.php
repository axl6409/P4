
<?php if(isset($start)) { ?>
    <?= $start; ?>
<?php } ?>

<form method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <?php if (!empty($postImage)) { ?>
            <div class="col-md-12 edit-image">
                <img src="public/img/<?= $postImage->name ;?>" alt="">
            </div>
            <?php } ?>
            <div class="col-md-5">
                <?= $form->input('image', 'Ajouter une image', ['type' => 'file']); ?>
            </div>
            <div class="col-md-2">
                <p>OU</p>
            </div>
            <div class="col-md-5">
                <?= $form->select('image_id', 'Selectionner une image', $images) ;?>
            </div>
        </div>
    </div>
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
