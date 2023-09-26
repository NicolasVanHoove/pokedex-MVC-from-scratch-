<?php

namespace app\models;

// Création de la classe mère, il n'y a que l'id qui est commun aux deux autres Model. 
class CoreModel
{
    // Je veux que les propriétés soient accessibles depuis les enfants -> visibilité protected
    protected $id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}