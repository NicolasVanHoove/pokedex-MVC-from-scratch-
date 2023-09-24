<?php

namespace app\controllers;

// Si besoin d'un model
// use app\models\Brand;


/**
 * Classe CoreController : classe mère qui sera héritée par tous les autres controllers de notre appli.
 * On y retrouve tout ce qui est commun à l'ensemble des controllers, c'est à dire uniquement la méthode show().
 */
class CoreController
{
    /**
     * Méthode show() : effecture le rendu de la vue $viewName, en lui envoyant les paramètres $viewData.
     * On est obligé de mettre cette méthode en `protected`, pour qu'elle soit accessible dans les classes filles (nos autres contrôleurs), qui héritent de cette classe CoreController.
     * 
     * @param string $viewName Le nom de la vue dont on doit faire le rendu.
     * @param array $viewData (optionnel) Les données à envoyer à la vue, sous forme d'un tableau associatif.
     */
    protected function show($viewName, $viewData = [])
    {
        // on utilise `global` pour accéder à la méthode `generate()` d'AltoRouter
        // c'est pas génial, mais pour l'instant on sait pas faire mieux :/
        global $router;

        //dump($viewData);
        //var_dump(__DIR__);

        // on se servira de ce $absoluteURL pour nos assets dans les fichiers de vue
        $absoluteURL = $_SERVER['BASE_URI'];

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}