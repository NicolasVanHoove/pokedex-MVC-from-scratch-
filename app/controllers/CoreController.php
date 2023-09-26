<?php

namespace app\controllers;

/**
 * Classe CoreController : classe mère qui sera héritée par tous les autres controllers de notre appli.
 * On y retrouve tout ce qui est commun à l'ensemble des controllers, c'est à dire uniquement la méthode show().
 */
class CoreController
{
    /**
     * Méthode show() : effecture le rendu de la vue $viewName, en lui envoyant les paramètres $viewData.
     * Je obligé de mettre cette méthode en `protected`, pour qu'elle soit accessible dans les classes filles (les autres controllers), qui héritent de cette classe CoreController.
     * 
     * @param string $viewName Le nom de la vue dont on doit faire le rendu.
     * @param array $viewData (optionnel) Les données à envoyer à la vue, sous forme d'un tableau associatif.
     */
    protected function show($viewName, $viewData = [])
    {
        // on utilise `global` pour accéder à la méthode `generate()` d'AltoRouter
        global $router;

        // dump($viewData);
        //var_dump(__DIR__);

        // Je me sers de $absoluteURL pour l'inclusion de mes assets dans les fichiers de vue (view)
        $absoluteURL = $_SERVER['BASE_URI'];

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}