<!--
 -- Admin ****************
 -- Edit page for options
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <?php if(isset($error)) { ?>
            <?= $error; ?>
        <?php } ?>
        <?php if(isset($start)) { ?>
            <?= $start; ?>
        <?php } ?>

        <!-- Option is an Image -->
        <?php if ($option->type == 3){ ;?>

        <form method="post" enctype="multipart/form-data">

            <?php if (!empty($postImage->name)) { ?>

                <div class="admin-index-image">
                    <img src="public/assets/<?= $postImage->name ;?>" alt="">
                </div>

            <?php } ?>
            <?= $form->input('value', 'Changer d\'image', ['type' => 'file']); ?>
            <?= $form->select('name', 'Selectionner une image', $images) ;?>
            <?= $form->submit('Modifier'); ?>

        </form>

        <!-- Option is a long text who need an editor -->
        <?php } elseif($option->type == 2) { ?>
        <div class="col-md-12">
            <form method="post">

                <?= $form->input('value', 'Nouvelle valeur', ['type' => 'textarea']) ;?>
                <?= $form->submit('Modifier'); ?>

            </form>
        </div>

        <!-- Option is a short text -->
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


