<?php

namespace app\models;

use app\utils\Database;
use PDO;

class Pokemon extends CoreModel
{
    private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

    public function find($id)
    {
        // 1. se connecter à la BDD
        // on a besoin de la classe Database
        //require_once __DIR__ . '/../utils/Database.php';
        // on peut utiliser cette classe pour établir la connexion
        $pdo = Database::getPDO();

        // 2. préparer la requête SQL
        $sql = "SELECT * FROM `pokemon` WHERE `id` = " . $id;

        // 3. lancer la requête SQL
        $stmt = $pdo->query($sql);

        // 4. récupérer les résultats
        //* fetchObject() fonctionne comme fetchAll(PDO::FETCH_CLASS) mais pour un seul objet (contrairement à un tableau d'objets pour fetchAll)
        $pokemon = $stmt->fetchObject('\app\models\Pokemon');

        // 5. on retourne le produit récupéré
        return $pokemon;
    }

    // permet de récupérer TOUS LES produits.
    public function findAll()
    {
        // 1. se connecter à la BDD
        // on a besoin de la classe Database
        //require_once __DIR__ . '/../utils/Database.php';
        // on peut utiliser cette classe pour établir la connexion
        $pdo = Database::getPDO();

        // 2. préparer la requête SQL
        $sql = "SELECT * FROM `pokemon` ORDER BY `number`";

        // 3. lancer la requête SQL
        $stmt = $pdo->query($sql);

        // 4. récupérer les résultats
        //* PDO::FETCH_CLASS permet de récupérer un tableau contenant des objets de la classe Brand (qui seront automatiquement instanciés par PDO)
        $pokemons = $stmt->fetchAll(PDO::FETCH_CLASS, '\app\models\Pokemon');

        // 5. les retourner
        return $pokemons;
    }

    public function findByType($id)
    {
        // On joint la table de pivot "pokemon_type" afin de pouvoir filtrer sur les ID de type
        $sql = "SELECT *
                FROM `pokemon` 
                INNER JOIN `pokemon_type` ON `pokemon_type`.`pokemon_number` = `pokemon`.`number`
                WHERE `pokemon_type`.`type_id` = {$id}
                ORDER BY `pokemon`.`number`";

        // On récupère la connexion à la BDD
        $pdo = Database::getPDO();

        // On exécute la requête avec query car on souhaite pouvoir accéder
        // aux données retournées par la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère tous les résultats avec "fetchAll" et on met transmet les données récupérées à une instance du model courant (Pokemon)
        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemons;
    }

    public function getTypes()
    {
        // On cherche dans la table de pivot "pokemon_type" les entrées qui correspondent au numéro fourni
        // puis on joint cette table à la table "type" dont on récupère les champs
        $sql = "SELECT `type`.*
                FROM `pokemon_type`
                INNER JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
                WHERE `pokemon_type`.`pokemon_number` = {$this->getNumber()}";

        // On récupère la connexion à la BDD
        $pdo = Database::getPDO();

        // On exécute la requête avec query car on souhaite pouvoir accéder
        // aux données retournées par la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère le résultat  et on instancie la classe Type avec les infos récupérées
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of hp
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of attack
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @return  self
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of spe_attack
     */
    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    /**
     * Set the value of spe_attack
     *
     * @return  self
     */
    public function setSpeAttack($spe_attack)
    {
        $this->spe_attack = $spe_attack;

        return $this;
    }

    /**
     * Get the value of spe_defense
     */
    public function getSpeDefense()
    {
        return $this->spe_defense;
    }

    /**
     * Set the value of spe_defense
     *
     * @return  self
     */
    public function setSpeDefense($spe_defense)
    {
        $this->spe_defense = $spe_defense;

        return $this;
    }

    /**
     * Get the value of speed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}
