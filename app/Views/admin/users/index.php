<h1>Gestion des utilisateurs</h1>

<div class="row">

    <div class="col-md-6">Pseudo</div>
    <div class="col-md-5">Actions</div>

    <?php foreach ($users as $user) : ?>

        <div class="col-md-6">
           <?= $user->username; ?>
        </div>
        <div class="col-md-6">
            <form action="index.php?p=admin.users.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $user->id; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>

    <?php endforeach; ?>

</div>
