<?php

class Grupo implements IGrupo
{
    private $id;
    private $grupo_id;
    private $cod;
    private $titulo;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getGrupoId()
    {
        return $this->$grupo_id;
    }
    
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;
        return $this;
    }
    
    public function getCod()
    {
        return $this->cod;
    }
    
    public function setCod($cod)
    {
        $this->cod;
        return $this;
    }
    
    public function getTitulo()
    {
        return $this->titulo;
    }
    
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }
    
}