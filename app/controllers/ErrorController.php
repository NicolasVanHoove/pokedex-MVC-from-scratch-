<?php

namespace app\controllers;

class ErrorController extends CoreController
{
    // méthode pour gérer l'affichage d'une erreur 404
    public function error404()
    {
        // on envoie l'en-tête HTTP 404
        //! C'est très important que nos erreurs 404 renvoient bien le code 404, c'est là dessus que vont se baser les robots des moteurs de recherche pour savoir s'ils doivent indexer une page ou pas.
        http_response_code(404);

        // on fait le rendu de la vue `error404.tpl.php` grâce à la méthode show() de notre CoreController
        $this->show('error404');
    }

    // TODO : gérer les autres erreur potentielles ! (401, 403, etc.)
}