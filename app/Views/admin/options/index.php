<!--
Admin
Main page for options
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <!-- Main Title -->
        <h1 class="admin-title">Administrer les Options du Site</h1>

        <!-- All the options -->
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
