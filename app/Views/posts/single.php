

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>

<ul>
    <?php foreach($comments as $comment) : ?>
        <li>
            <p><?= $comment->content; ?></p>
        </li>
    <?php endforeach; ?>
</ul>


