

<div class="container admin-container">
    <div class="row">
        <h1 class="admin-title">Gestion des utilisateurs</h1>

        <table class="table">
            <thead>
            <tr>
                <td>Pseudo</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->username; ?></td>

                    <td>
                        <div class="col-md-6">
                            <form action="index.php?p=admin.users.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user->id; ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
