<h1>Administrer les Commentaires</h1>

<div class="container">
    <div class="row">

        <div class="col-md-12">

            <h2>Commentaires à vérifier</h2>

            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Actions</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($comments as $comment) : ?>
                    <tr>
                        <td>
                            <?= $comment->id; ?>
                        </td>
                        <td>
                            <?= $comment->content; ?>
                        </td>
                        <td>
                            <form action="?p=admin.comments.valid" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $comment->id; ?>">
                                <button type="submit" class="btn btn-success">Valider</button>
                            </form>

                            <form action="?p=admin.comments.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $comment->id; ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>





