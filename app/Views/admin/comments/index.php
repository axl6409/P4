<div class="container admin-container">
    <div class="row">
        <div class="col-md-12">

            <h1 class="admin-title">Administrer les Commentaires</h1>

            <div class="admin-sections">
                <h2 class="admin-sub-title">Commentaires à vérifier</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <td>Pseudo</td>
                        <td>Contenu</td>
                        <td>Actions</td>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td>
                                <?= $comment->user; ?>
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


            <div class="admin-sections">
                <h2 class="admin-sub-title">Tous les commentaires</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <td>Pseudo</td>
                        <td>Contenu</td>
                        <td>Actions</td>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($allComments as $oneComment) : ?>
                        <tr>
                            <td>
                                <?= $oneComment->user; ?>
                            </td>
                            <td>
                                <?= $oneComment->content; ?>
                            </td>
                            <td>

                                <form action="?p=admin.comments.delete" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $oneComment->id; ?>">
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
</div>





