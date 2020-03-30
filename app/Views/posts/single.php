

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>

<div>
    <form method="post">
        <?= $form->input('content', 'Commentaire', ['type' => 'editor']); ?>
        <button class="btn btn-primary">Sauvegarder</button>
    </form>
</div>

<ul>
    <?php foreach($comments as $comment) : ?>
        <li>
            <p><?= $comment->content; ?></p>
        </li>
    <?php endforeach; ?>
</ul>


