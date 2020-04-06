
<h1>Administrer les Images</h1>

<p>
    <a href="index.php?p=admin.images.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($images as $image) : ?>
        <tr>
            <td>
                <?= $image->id; ?>
            </td>
            <td>
                <img src="public/img/<?= $image->name; ?>" alt="">
            </td>
            <td>
                <a class="btn btn-primary" href="index.php?p=admin.images.edit&id=<?= $image->id; ?>">Éditer</a>

                <form action="index.php?p=admin.images.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $image->id; ?>">
                    <input type="hidden" name="name" value="<?= $image->name ;?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
