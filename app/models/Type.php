<?php

namespace app\models;

use app\utils\Database;
use PDO;

class Type extends CoreModel
{
    private $name;
    private $color;

    public function find($id)
    {
        // 1. se connecter à la BDD
        // on a besoin de la classe Database
        //require_once __DIR__ . '/../utils/Database.php';
        // on peut utiliser cette classe pour établir la connexion
        $pdo = Database::getPDO();

        // 2. préparer la requête SQL
        $sql = "SELECT * FROM `type` WHERE `id` = " . $id;

        // 3. lancer la requête SQL
        $stmt = $pdo->query($sql);

        // 4. récupérer les résultats
        //* fetchObject() fonctionne comme fetchAll(PDO::FETCH_CLASS) mais pour un seul objet (contrairement à un tableau d'objets pour fetchAll)
        $type = $stmt->fetchObject('\app\models\Type');

        // 5. on retourne le produit récupéré
        return $type;
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
        $sql = "SELECT * FROM `type` ORDER BY `id`";

        // 3. lancer la requête SQL
        $stmt = $pdo->query($sql);

        // 4. récupérer les résultats
        //* PDO::FETCH_CLASS permet de récupérer un tableau contenant des objets de la classe Brand (qui seront automatiquement instanciés par PDO)
        $types = $stmt->fetchAll(PDO::FETCH_CLASS, '\app\models\Type');

        // 5. les retourner
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
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
