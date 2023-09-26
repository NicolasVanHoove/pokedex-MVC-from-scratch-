
<section id="container-pokemons">
    <?php foreach ($viewData['type'] as $type) : ?>
        <article class="article-pokemon">
            <img src="<?= $absoluteURL ?>/assets/img/<?= $type->getNumber() ?>.png" alt="" width=40% height=40%><br>
            <p>#<?= $type->getNumber() ?> <?= $type->getName() ?></p>
        </article>
    <?php endforeach; ?>
</section>