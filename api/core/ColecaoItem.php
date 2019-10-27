<?php

class ColecaoItem implements IColecaoItem
{

    private $id;
    private $colecao_id;
    private $titulo;
    private $data;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }

    public function getColecaoId(){
        return $this->colecao_id;
    }

    public function setColecaoId($colecao_id){
        $this->colecao_id =  $colecao_id;
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

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    
}