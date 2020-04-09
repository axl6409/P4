
<div class="hero" style="background-image: url('public/assets/<?= $optionImage->name; ?>')">
    <div class="hero-overlay"></div>
    <div class="hero-container">

        <h1>Chapitres</h1>

    </div>
</div>

<div class="container">
    <div class="post-container">

        <?php foreach($posts as $post) : ?>
            <div class="post-section">
                <div class=" post-image" style="background-image: url('public/img/<?= $postImage->name; ?>')">

                </div>
                <div class="col-md-6">
                    <h2 class="post-title"><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

                    <div class="post-content">
                        <?= $post->excerpt; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>





