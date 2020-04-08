
<div class="container admin-container">
    <div class="row">
        <h1>Administrer les Options du Site</h1>

        <div class="row">

            <div class="col-md-1">ID</div>
            <div class="col-md-3">Nom</div>
            <div class="col-md-7">Valeur</div>
            <div class="col-md-1">Actions</div>

            <?php foreach ($options as $option) : ?>

                <div class="col-md-1">
                    <?= $option->id; ?>
                </div>
                <div class="col-md-3 admin-index-image">
                    <?= $option->name; ?>
                </div>
                <div class="col-md-7 admin-index-image">
                    <?= $option->value; ?>
                </div>
                <div class="col-md-1">
                    <a class="btn btn-primary" href="index.php?p=admin.options.edit&id=<?= $option->id; ?>">Éditer</a>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
