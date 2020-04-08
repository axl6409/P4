

<div class="admin-container">
    <div class="container">
        <div class="row">

            <?php if(isset($error)) { ?>
                <?= $error; ?>
            <?php } ?>
            <?php if(isset($start)) { ?>
                <?= $start; ?>
            <?php } ?>

            <?php if ($_GET['id'] == 1){ ;?>

            <form method="post" enctype="multipart/form-data">

                <?php if (isset($option->value)) { ?>

                    <div class="admin-index-image">
                        <img src="public/assets/<?= $option->value ;?>" alt="">
                    </div>

                <?php } ?>

                <?= $form->input('value', 'Changer d\'image', ['type' => 'file']); ?>
                <?= $form->submit('Modifier'); ?>

            </form>

            <?php } else { ?>

            <form method="post">

            <?= $form->input('value', 'Nouvelle valeur') ;?>
            <?= $form->submit('Modifier'); ?>

            </form>

            <?php } ?>
        </div>
    </div>
</div>

