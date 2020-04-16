<div class="container admin-container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="admin-title">Administrer les Histoires</h1>

            <p class="new-post-btn">
                <a href="index.php?p=admin.posts.add" class="btn btn-outline-success">Nouveau Chapitre</a>
            </p>


            <table class="table posts-list">
                <thead>
                <tr>
                    <td class="th-post-title">Titre</td>
                    <td class="th-post-excerpt">Extrait</td>
                    <td class="th-post-action">Actions</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr class="table-row">
                        <td class="col-1 t-post-title">
                            <?= $post->title; ?>
                        </td>
                        <td class="col-2 t-post-excerpt">
                            <?= $post->excerptadmin; ?>
                        </td>
                        <td class="col-3 t-post-action">
                            <a class="btn btn-primary" href="index.php?p=admin.posts.edit&id=<?= $post->id; ?>">Éditer</a>

                            <form action="index.php?p=admin.posts.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $post->id; ?>">
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


