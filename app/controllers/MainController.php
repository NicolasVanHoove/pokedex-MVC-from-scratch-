<?php

namespace app\controllers;

use app\models\Pokemon;

class MainController extends CoreController
{
    // méthodes (public) pour afficher la page d'accueil (= home.tpl.php) :
    public function home()
    {
        // J'affiche la vue (view)
        $this->show('home');
    }

    // méthodes (public) pour afficher la page listant les 151 pokemons (= home.tpl.php) :
    public function pokemons()
    {
        $pokemonModel = new Pokemon();
        // 2. J'utilise la méthode findAll() de ce modèle pour récupérer les données des 151 pokemons.
        $pokemons = $pokemonModel->findAll();

        // J'envoie les données à la vue (view)
        $dataToSend['pokemons'] = $pokemons;

        // J'affiche la vue (view)
        $this->show('pokemons', $dataToSend);
    }
}