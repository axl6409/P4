

<div class="admin-container">
    <div class="container">
        <div class="row">

            <?php if(isset($error)) { ?>
                <?= $error; ?>
            <?php } ?>
            <?php if(isset($start)) { ?>
                <?= $start; ?>
            <?php } ?>

            <?php if ($option->type == 3){ ;?>

            <form method="post" enctype="multipart/form-data">

                <?php if (isset($option->value)) { ?>

                    <div class="admin-index-image">
                        <img src="public/assets/<?= $postImage->name ;?>" alt="">
                    </div>

                <?php } ?>
                <?= $form->input('value', 'Changer d\'image', ['type' => 'file']); ?>
                <?= $form->select('name', 'Selectionner une image', $images) ;?>
                <?= $form->submit('Modifier'); ?>

            </form>

            <?php } elseif($option->type == 2) { ?>
            <div class="col-md-12">
                <form method="post">

                    <?= $form->input('value', 'Nouvelle valeur', ['type' => 'textarea']) ;?>
                    <?= $form->submit('Modifier'); ?>

                </form>
            </div>

            <?php } elseif ($option->type == 1) { ?>
                <div class="col-md-12">
                    <form method="post">

                        <?= $form->input('value', 'Nouvelle valeur') ;?>
                        <?= $form->submit('Modifier'); ?>

                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

