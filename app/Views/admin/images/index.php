
<h1>Administrer les Images</h1>

<p>
    <a href="index.php?p=admin.images.add" class="btn btn-success">Ajouter</a>
</p>

<div class="row">


    <div class="col-md-1">ID</div>
    <div class="col-md-6">Titre</div>
    <div class="col-md-5">Actions</div>



    <?php foreach ($images as $image) : ?>

        <div class="col-md-1">
            <?= $image->id; ?>
        </div>
        <div class="col-md-6 admin-index-image">
            <img src="public/img/<?= $image->name; ?>" alt="">
        </div>
        <div class="col-md-5">
            <a class="btn btn-primary" href="index.php?p=admin.images.edit&id=<?= $image->id; ?>">Éditer</a>

            <form action="index.php?p=admin.images.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $image->id; ?>">
                <input type="hidden" name="name" value="<?= $image->name ;?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>

    <?php endforeach; ?>

</div>
