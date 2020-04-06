
<?php if ($error) { ?>
    <?= $error; ?>
<?php } elseif (isset($start)) { ?>
    <?= $start; ?>
<?php } ?>

<form method="post" enctype="multipart/form-data">
    <?= $form->input('image', 'Ajouter une image', ['type' => 'file']); ?>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>
</form>
