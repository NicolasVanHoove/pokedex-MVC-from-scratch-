<?php

namespace app\controllers;

use app\models\Pokemon;

class MainController extends CoreController
{
    // méthodes (public) pour les différentes pages :
    public function home()
    {
        $this->show('home');
    }

    public function pokemons()
    {
        $pokemonModel = new Pokemon();
        // 2. on utilise la méthode findAllHomepage() de ce modèle pour récupérer les catégories mises en avant.
        $pokemons = $pokemonModel->findAll();

        // on envoie les données à la vue
        $dataToSend['pokemons'] = $pokemons;


        $this->show('pokemons', $dataToSend);
    }
}