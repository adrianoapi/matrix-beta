<?php

class LancamentoFixo implements ILancamentoFixo
{

    private $id;
    private $valor;
    private $descricao;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
    
}