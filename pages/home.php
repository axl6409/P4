
<ul>
    <?php foreach($db->query('SELECT * FROM stories') as $story) : ?>
        <li>
            <a href="index.php?p=story$id=<?= $story->id; ?>"><?= $story->title; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
