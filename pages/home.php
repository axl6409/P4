<div class="row">
    <div class="col-sm-8">

        <?php foreach(\App\Table\Stories::getLast() as $story) : ?>

            <h2><a href="<?= $story->url; ?>"><?= $story->title; ?></a></h2>

            <p><em><?= $story->categorie; ?></em></p>

            <p><?= $story->excerpt; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach(\App\Table\Categorie::all() as $categorie) : ?>
            <li>
                <a href="<?= $categorie->url; ?>"><?= $categorie->title; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>



