<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/styles2.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <title>pokedex</title>
</head>

<body>
    <header>
        <img src="<?= $absoluteURL ?>/assets/img/40.png" alt="" width=15% height=15%>
        <h1>Le Pokedex</h1>
        <img src="<?= $absoluteURL ?>/assets/img/151.png" alt="" width=15% height=15%>
    </header>
    <nav>
        <a href="<?= $router->generate('pokemons') ?>">Liste des Pokémons</a>
        <a href="<?= $router->generate('types') ?>">Liste des Types</a>
    </nav>
    <main>