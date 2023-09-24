<p>Clique sur un pokemon pour accéder à l'ensemble de ses informations</p>
<section id="container-pokemons">
<?php foreach ($viewData['pokemons'] as $pokemon) : ?>
    <article class="article-pokemon">
        <a href="<?= $router->generate('pokemon', ['id' => $pokemon->getId()]) ?>">
        <img src="<?= $absoluteURL ?>/assets/img/<?= $pokemon->getNumber() ?>.png" alt="" width=40% height="40%"></a><br>
        <a href="<?= $router->generate('pokemon', ['id' => $pokemon->getId()]) ?>">#<?= $pokemon->getNumber() ?> <?= $pokemon->getName() ?></a>
    </article>
<?php endforeach; ?>
</section>