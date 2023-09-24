<section id="container-pokemons">
<?php foreach ($viewData['type'] as $type) : ?>
    <?= $type->getName() ?>
<?php endforeach; ?>
</section>

<section id="container-pokemons">
    <?php foreach ($viewData['type'] as $type) : ?>
        <article class="article-pokemon">
            <img src="<?= $absoluteURL ?>/assets/img/<?= $type->getNumber() ?>.png" alt="" max-width=100% max-height=100%><br>
            <a href="<?= $router->generate('pokemon', ['id' => $type->getId()]) ?>">#<?= $type->getNumber() ?> <?= $type->getName() ?></a>
        </article>
    <?php endforeach; ?>
</section>