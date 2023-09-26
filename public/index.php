<?php

// index.php -> Le FrontController, point d'entrée unique de l'application

// grâce à composer, on peut charger automatiquement TOUTES les dépendances en faisant un require du fichier autoload.php
//! l'autoload de composer ci-dessous va également charger automatiquement toutes les classes créées.
require_once __DIR__ . '/../vendor/autoload.php';

// Pour utiliser AltoRouteur, il faut instancier la classe AltoRouter
$router = new AltoRouter();

 
//* AltoRouter va analyser la requête de l'utilisateur, et essayer de déduire la route / la page qu'il veut visiter
//* (partie route, ce que veut voir l'user)
//* (partie dossier, là où se trouve mon projet)
//* AltoRouteur analyse la partie route donc la ligne ci-dessous lui permet d'ignorer la partie "dossier" !
$router->setBasePath($_SERVER['BASE_URI']);

// Je "mappe" les routes avec la méthode map() d'AltoRouter :
$router->map(
    'GET', // la méthode HTTP acceptée par cette route
    '/', // l'URL saisie par l'utilisateur
    [
        'action' => 'home', // le nom de la méthode à appeler
        'controller' => '\app\controllers\MainController' // le nom du controller à instancier
    ],
    'home' // le nom donné à cette route
);

$router->map(
    'GET', // la méthode HTTP acceptée par cette route
    '/pokemons', // l'URL saisie par l'utilisateur
    [
        'action' => 'pokemons', // le nom de la méthode à appeler
        'controller' => '\app\controllers\MainController' // le nom du controller à instancier
    ],
    'pokemons' // le nom donné à cette route
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
    'types' // le nom donné à cette route
);

$router->map('GET', '/type/[i:id]', [
    'action' => 'type',
    'controller' => '\app\controllers\TypeController'
], 'type');

// La méthode match() d'AltoRouter essaye de "matcher" la requête de l'utilisateur avec une de mes routes
$match = $router->match();

// si la route n'existe pas (si le match a échoué)
// $match sera false
// donc pour gérer les erreurs 404 (route inconnue), je fais un if sur $match !
if ($match) {
    //var_dump($match['target']);

    $controllerName = $match['target']['controller'];
    $methodName = $match['target']['action'];

    // DISPATCH
    // instanciation du bon contrôleur
    $controller = new $controllerName();
    // Appel de la méthode appropriée de ce contrôleur
    //* Et j'envoie les paramètres éventuels ($match['params']) à la méthode du contrôleur !
    $controller->$methodName($match['params']);

} else {
    // la route demandée par l'utilisateur n'existe pas, donc j'affiche une erreur 404 !
    $errorController = new app\controllers\ErrorController();
    $errorController->error404();
}
