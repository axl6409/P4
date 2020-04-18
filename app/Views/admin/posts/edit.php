<!--
 -- Admin ****************
 -- Edit page for posts
 -->

<?php if(isset($start)) { ?>
    <?= $start; ?>
<?php } ?>

<div class="admin-container"> <!-- Container -->
    <div class="container"> <!-- Row -->

        <form method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <?php if (!empty($postImage)) { ?>
                        <div class="col-md-12 edit-image">
                            <img src="public/img/<?= $postImage->name ;?>" alt="">
                        </div>
                    <?php } ?>
                    <div class="col-md-5 edit-fields">
                        <?= $form->input('image', 'Ajouter une image', ['type' => 'file']); ?>
                    </div>
                    <div class="col-md-2 edit-fields">
                        <p>OU</p>
                    </div>
                    <div class="col-md-5 edit-fields">
                        <?= $form->select('image_id', 'Selectionner une image', $images) ;?>
                    </div>
                </div>
            </div>
            <?= $form->input('title', 'Titre de l\'article'); ?>
            <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
            <button type="submit" class="btn btn-primary edit-submit">Sauvegarder</button>
        </form>

    </div> <!-- End Row -->
</div> <!-- End Container -->


