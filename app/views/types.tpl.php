<p>Cliquez sur un type pour accéder à la liste de pokémons de ce type</p>

<section class="types-list">
    <?php foreach ($viewData['types'] as $type) : ?>
        <a href="<?= $router->generate('type', ['id' => $type->getId()]) ?>" style="background-color:#<?= $type->getColor() ?>; border-radius: 10px; padding: 0.5rem"><?= $type->getName() ?></a>
    <?php endforeach; ?>
</section>