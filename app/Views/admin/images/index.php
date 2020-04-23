<!--
Admin
Main page for images
 -->

<div class="container admin-container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <!-- Main Title -->
        <h1 class="admin-title">Administrer les Images</h1>

        <!-- Chapter Images -->
        <div class="col-md-12 admin-sections">

            <h2 class="admin-sub-title">Images des Chapitres</h2>

            <?php foreach ($postsImages as $postImage) : ?>
                <div class="images-container" style="background-image: url('public/img/<?= $postImage->name; ?>')">
                    <div class="images-infos">
                        <h3><?= $postImage->name;?></h3>
                        <form action="index.php?p=admin.images.delPost" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $postImage->id; ?>">
                            <input type="hidden" name="name" value="<?= $postImage->name ;?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <!-- Options Images -->
        <div class="col-md-12 admin-sections">

            <h2 class="admin-sub-title">Images du Site</h2>

            <?php foreach ($optionsImages as $optionImage) : ?>
                <div class="images-container" style="background-image: url('public/assets/<?= $optionImage->name; ?>')">
                    <div class="images-infos">
                        <h3><?= $optionImage->name;?></h3>
                        <form action="index.php?p=admin.images.delOption" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $optionImage->id; ?>">
                            <input type="hidden" name="name" value="<?= $optionImage->name ;?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
