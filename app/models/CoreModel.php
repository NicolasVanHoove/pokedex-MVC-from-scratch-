<?php

namespace app\models;

class CoreModel
{
    // on veut que les propriétés soient accessibles depuis les enfants -> visibilité protected
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