

<div class="hero" style="background-image: url('public/assets/<?= $optionImage->name; ?>')">
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1>Chapitres</h1>
    </div>
</div>

<div class="container">
    <div class="post-container">

        <div class="post-introduction box-shadow">
            <?= $options[11]->value ;?>
        </div>

        <?php foreach($posts as $post) : ?>
            <div class="post-section">
                <?php $postImage = $this->PostsImage->find($post->image_id); ?>
                <div class=" post-image box-shadow" style="background-image: url('public/img/<?= $postImage->name; ?>')">
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





