<?php

namespace app\controllers;

// import de la Classe Pokemon car elle est instanciée dans les différentes méthodes du controller 
use app\models\Pokemon;

class PokedexController extends CoreController
{
    // méthodes (public) pour afficher la page de détail d'un pokéon (= pokemon.tpl.php) :
    public function pokemon($params)
    {
        // $params est un tableau qui contient tous les paramètres dans l'URL 
        // pour récupérer l'ID :
        $id = $params['id'];

        // J'ai besoin des informations sur le pokémon, je les récupère via le Model Pokemon (et sa méthode find())
        $pokemonModel = new Pokemon();
        $pokemon = $pokemonModel->find($id);
        $types = $pokemon->getTypes();

        // Je prépare les données à envoyer à notre vue
        $dataToSend['pokemon'] = $pokemon;
        $dataToSend['types'] = $types;

        // J'affiche la vue (view)
        $this->show('pokemon', $dataToSend);
    }
}