<?php include "./header.php" ?>

<div class="affiche center">
    <?php foreach ($element as $member) { ?>
        <article class="member">
            <h2>Je m'appelle :<?= $member['firstname'] . " " . $member['lastname'] ?></h2>
            <h3>Je suis ne le <?= $member['birthdate'] ?></h3>
            <h3>a <?= $member['country'] ?></h3>
            <h3>Voici mon address <?= $member['address'] ?></h3>
        </article>
    <?php } ?>
</div>