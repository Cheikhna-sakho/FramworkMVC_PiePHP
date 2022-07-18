<?php include "./header.php" ?>

<div class="affiche center">
    <?php $movie = $element ?>
    <?php foreach ($element as $movie) { ?>
        <article class="movie">
            <h2>Je m'appelle :<?= $movie['title'] ?></h2>
            <h3>Je suis ne le <?= $movie['release_date'] ?></h3>
            <h3>a ?></h3>
            <h3>?></h3>
        </article>
    <?php } ?>
</div>