<?php

class Pagamento implements IPagamento
{
    private $id;
    private $cod;
    private $tipo;
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
    
    public function getCod()
    {
        return $this->cod;
    }
    
    public function setCod($cod)
    {
        $this->cod;
        return $this;
    }
    
    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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