<?php

namespace app\controllers;

use app\models\Type;
use app\models\Pokemon;

class TypeController extends CoreController
{
    public function types()
    {
        $typesModel = new Type();
        // 2. on utilise la méthode findAllHomepage() de ce modèle pour récupérer les catégories mises en avant.
        $types = $typesModel->findAll();

        // on envoie les données à la vue
        $dataToSend['types'] = $types;

        $this->show('types', $dataToSend);
    }

    public function type($params)
    {
        $id = $params['id'];

        $pokemonsModel = new Pokemon();
        // 2. on utilise la méthode findAllHomepage() de ce modèle pour récupérer les catégories mises en avant.
        $pokemons = $pokemonsModel->findByType($id);

        // on envoie les données à la vue
        $dataToSend['type'] = $pokemons;

        $pokemonModel = new Pokemon();
        // 2. on utilise la méthode findAllHomepage() de ce modèle pour récupérer les catégories mises en avant.
        $pokemons = $pokemonModel->findAll();

        // on envoie les données à la vue
        $dataToSend['pokemons'] = $pokemons;

        $this->show('type', $dataToSend);
    }
}
