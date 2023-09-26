<?php

namespace app\controllers;

// Import des Classes Type et Pokemon car elles sont instanciées dans les différentes méthodes du controller
use app\models\Type;
use app\models\Pokemon;

class TypeController extends CoreController
{
    public function types()
    {
        $typesModel = new Type();
        // 2. J'utilise la méthode findAll() du Model Type .
        $types = $typesModel->findAll();
    
        // J'envoie les données à la vue
        $dataToSend['types'] = $types;

        $this->show('types', $dataToSend);
    }

    public function type($params)
    {
        $id = $params['id'];

        $pokemonsModel = new Pokemon();
        // 2. on utilise la méthode findByType() de ce modèle pour récupérer les pokemons selon leur type.
        $pokemons = $pokemonsModel->findByType($id);

        // J'envoie les données à la vue
        $dataToSend['type'] = $pokemons;

        $pokemonModel = new Pokemon();
        // 2. J'utilise la méthode findAll() du Model Pokemon.
        $pokemons = $pokemonModel->findAll();

        // J'envoie les données à la vue
        $dataToSend['pokemons'] = $pokemons;

        $this->show('type', $dataToSend);
    }
}
