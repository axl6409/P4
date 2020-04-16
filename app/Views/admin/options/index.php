
<div class="container admin-container">
    <div class="row">
        <h1 class="admin-title">Administrer les Options du Site</h1>

        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td class="th-options-name">Nom</td>
                    <td class="th-options-action">Action</td>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($options as $option) : ?>
                    <tr>
                        <td class="t-options-name">
                            <?= $option->name; ?>
                        </td>
                        <td class="t-options-action">
                            <a class="btn btn-primary" href="index.php?p=admin.options.edit&id=<?= $option->id; ?>">Éditer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>



    </div>
</div>
