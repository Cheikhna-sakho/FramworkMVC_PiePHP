<?php include "./header.php" ?>

<div class="affiche center">
    <?php foreach($element as $member){?>
        <article class="member">
            <h2><a href=<?= "cinema/member"?>><?= $member['firstname'] . " " . $member['lastname'] ?></h2>
            <h3><?= $member['birthdate'] ?></h3>
            <h3><?= $member['country'] ?></h3>
            <h3><?= $member['address'] ?></h3>
        </article>
    <?php }?>
</div>