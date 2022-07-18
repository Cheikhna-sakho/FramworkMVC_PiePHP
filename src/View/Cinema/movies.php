<?php include "./header.php" ?>
<div class="affiche center">
    <?php foreach ($element as $movie) { ?>

        <article class="movie">
            <h2><a href=<?= "cinema/movie" . $movie['id'] ?>>Titre : <span><?= $movie['title'] ?></span></a></h2>
            <h3>Directeur : <span><?= $movie['director'] ?></span></h3>
            <h3>Date : <span><?= $movie['release_date'] ?></span></h3>
            <h3>Distributeur : <span><?= $movie['d_name'] ?></span></h3>
            <h3>Genre : <span><?= $movie['g_name'] ?></span></h3>
        </article>
    <?php } ?>
</div>