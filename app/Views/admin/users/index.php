<!--
Admin
Main page for users
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <!-- Main Title -->
        <h1 class="admin-title">Gestion des utilisateurs</h1>

        <table class="table">
            <thead>
            <tr>
                <td class="th-user">Pseudo</td>
                <td class="th-user">Actions</td>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="t-user"><?= $user->username; ?></td>

                    <td>
                        <div class="col-md-6 user-delete">
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

    </div> <!-- End Row -->
</div> <!-- End Container -->
