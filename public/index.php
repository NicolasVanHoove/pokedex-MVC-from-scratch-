<?php

// index.php -> notre FrontController, point d'entrée unique de notre application

// grâce à composer, on peut charger automatiquement TOUTES les dépendances en faisant un require du fichier autoload.php
//! l'autoload de composer ci-dessous va également charger automatiquement toutes nos classes à nous.
require_once __DIR__ . '/../vendor/autoload.php';

// d'après la doc, pour utiliser AltoRouteur, il faut qu'on instancie la classe AltoRouter
$router = new AltoRouter();

// pour la suite, on aura besoin de ça : 
//* AltoRouter va analyser la requête de l'utilisateur, et essayer de déduire la route / la page qu'il veut visiter
//* problème : notre URL ressemble à : http://localhost/S05/Zinc/S05-projet-oShop-bdelphin/public/category/42
//* comment AltoRouteur peut différencier la partie "route" de la partie "dossier" ?
//* (partie route, ce que veut voir l'user : /category/42)
//* (partie dossier, là où se trouve notre projet : /S05/Zinc/S05-projet-oShop-bdelphin/public)
//* on veut juste qu'AltoRouteur analyse la partie route, donc avec la ligne ci-dessous on lui dit d'ignorer la partie "dossier" !
$router->setBasePath($_SERVER['BASE_URI']);

// on "mappe" les routes avec la méthode map() d'AltoRouter :
$router->map(
    'GET', // la méthode HTTP acceptée par cette route
    '/', // l'URL saisie par l'utilisateur
    [
        'action' => 'home', // le nom de la méthode à appeler
        'controller' => '\app\controllers\MainController' // le nom du controller à instancier
    ],
    'home' // le nom qu'on donne à cette route
);

$router->map(
    'GET', // la méthode HTTP acceptée par cette route
    '/pokemons', // l'URL saisie par l'utilisateur
    [
        'action' => 'pokemons', // le nom de la méthode à appeler
        'controller' => '\app\controllers\MainController' // le nom du controller à instancier
    ],
    'pokemons' // le nom qu'on donne à cette route
);

$router->map('GET', '/pokemon/[i:id]', [
    'action' => 'pokemon',
    'controller' => '\app\controllers\PokedexController'
], 'pokemon');

$router->map(
    'GET', // la méthode HTTP acceptée par cette route
    '/types', // l'URL saisie par l'utilisateur
    [
        'action' => 'types', // le nom de la méthode à appeler
        'controller' => '\app\controllers\TypeController' // le nom du controller à instancier
    ],
    'types' // le nom qu'on donne à cette route
);

$router->map('GET', '/type/[i:id]', [
    'action' => 'type',
    'controller' => '\app\controllers\TypeController'
], 'type');

// on essaye de "matcher" la requête de l'utilisateur avec une de nos routes
$match = $router->match();
//var_dump($match);

// si la route n'existe pas (si le match a échoué)
// $match sera false
// donc pour gérer les erreurs 404 (route inconnue), on va faire un if sur $match !
if ($match) {
    // $match n'est pas false, ça veut dire que la route exite !

    //var_dump($match['target']);

    $controllerName = $match['target']['controller'];
    $methodName = $match['target']['action'];

    //echo "On va instancier le controller " . $controllerName . '<br>';
    //echo "et appeler la méthode " . $methodName;

    //var_dump($match['params']);

    // DISPATCH
    // on instancie le bon contrôleur
    $controller = new $controllerName();
    // on appelle la méthode appropriée de ce contrôleur
    //* Et on envoie les paramètres éventuels ($match['params']) à notre méthode de contrôleur !
    $controller->$methodName($match['params']);

} else {
    // la route demandée par l'utilisateur n'existe pas, donc on lui affiche une erreur 404 !
    $errorController = new app\controllers\ErrorController();
    $errorController->error404();
}
