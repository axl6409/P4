
<div class="container admin-container">
    <div class="row">
        <h1 class="admin-title">Administrer les Options du Site</h1>

        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Valeur</td>
                    <td>Action</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($options as $option) : ?>
                    <tr>
                        <td>
                            <?= $option->name; ?>
                        </td>
                        <td>
                            <?= $option->excerpt; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="index.php?p=admin.options.edit&id=<?= $option->id; ?>">Éditer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>



    </div>
</div>
