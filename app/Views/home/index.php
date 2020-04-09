
<div class="hero" style="background-image: url('public/assets/<?= $heroImage->name ;?>')">
    <div class="hero-overlay"></div>
    <div class="hero-container">

        <h1 class="hero-title"><?= $options[1]->value ;?></h1>
        <?= $options[2]->value ;?>

    </div>

</div>

<div class="container home-container">
    <div class="row">
        <div class="col-md-12">

            <div class="row featurette section">

                <div class="col-md-12 section-first">
                    <h2 class="section-title">A Propos</h2>

                    <h3 class="section-sub-title"><?= $options[3]->value ;?></h3>

                    <div class="about-content">
                        <?= $options[4]->value ;?>
                    </div>

                </div>
                <div class="col-md-6 section-image">
                    <img src='public/assets/<?= $bioImage->name ;?>' alt="">
                </div>
                <div class="col-md-6 section-quote">
                    <?= $options[6]->value ;?>
                </div>
            </div>

            <div class="row featurette">

                <div class="col-md-7">
                    <h2 class="section-title">Découvrez mon nouveau roman en ligne</h2>

                    <h3 class="section-sub-title"><?= $options[7]->value ;?></h3>

                    <div class="section-content">
                        <?= $options[8]->value ;?>
                    </div>

                    <a href="index.php?p=posts.index">Lire les chapitres</a>
                </div>
                <div class="col-md-5 section-image">
                    <img src='public/assets/<?= $romanImage->name ;?>' alt="">
                </div>

            </div>

        </div>

    </div>
</div>


