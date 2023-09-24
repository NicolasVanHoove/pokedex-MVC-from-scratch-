<?php

$pokemon = $viewData['pokemon'];
$types = $viewData['types'];

?>

<section id="container-title">
    <h2>Détails de <?= $pokemon->getName() ?></h2>
    <div class="types">
        <ul>
            <?php
            foreach ($types as $type) :
                echo "<li class='type' style='background:#" . $type->getColor() . "; border-radius: 15px; padding: 0.5rem; font-size: 0.8rem;'>" . $type->getName() . "</li>";
            endforeach;
            ?>
        </ul>
    </div>
</section>
<section id="container-detail">
    <img src="<?= $absoluteURL ?>/assets/img/<?= $pokemon->getNumber() ?>.png" alt="" width=35% height=35%>
    <ul id="stats">
        <li>PV : <?= $pokemon->getHp() ?></li>
        <li>Attaque : <?= $pokemon->getAttack() ?></li>
        <li>Defense : <?= $pokemon->getDefense() ?></li>
        <li>Attaque Spé : <?= $pokemon->getSpeAttack() ?></li>
        <li>Défense Spé : <?= $pokemon->getSpeDefense() ?></li>
        <li>Vitesse : <?= $pokemon->getSpeed() ?></li>
    </ul>
</section>