<?php

class Nota implements INota
{
    private $id;
    private $categoria_id;
    private $titulo;
    private $texto;
    private $data_criacao;
    
    function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    function getId() {
        return $this->id;
    }
    
    function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
        return $this;
    }
    
    function getCategoriaId() {
        return $this->categoria_id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
        return $this;
    }
    
    function getTexto() {
        return $this->texto;
    }
    
    public function setDataCriacao($data_criacao){
        $this->data_criacao = $data_criacao;
        return $this;
    }
    
    public function getDataCriacao(){
        return $this->data_criacao;
    }

}