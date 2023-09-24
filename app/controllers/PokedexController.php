<?php

namespace app\controllers;

use app\models\Pokemon;

class PokedexController extends CoreController
{
    public function pokemon($params)
    {
        // $params est un tableau qui contient TOUS les paramètres dans l'URL !
        // pour récupérer l'ID :
        $id = $params['id'];

        // on a besoin des infos du produit, on les récupère via notre modèle Product (et sa méthode find())
        $pokemonModel = new Pokemon();
        $pokemon = $pokemonModel->find($id);
        $types = $pokemon->getTypes();

        // on prépare les données à envoyer à notre vue
        $dataToSend['pokemon'] = $pokemon;
        $dataToSend['types'] = $types;

        $this->show('pokemon', $dataToSend);
    }
}