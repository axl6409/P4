<!--
Public
Main page for Posts
 -->

<div class="hero" style="background-image: url('public/assets/<?= $optionImage->name; ?>')"> <!-- Hero -->
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <h1>Chapitres</h1>
    </div>
</div> <!-- End Hero -->

<div class="container"> <!-- Container -->
    <div class="row"> <!-- Row -->

        <div class="col-md-12">

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
                        <p class="post-date"><?= $post->date ;?></p>
                        <div class="post-excerpt">
                            <?= $post->excerpt; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div> <!-- End Row -->
</div> <!-- End Container -->





