<?php

class LancamentoItem implements ILancamentoItem
{
    private $id;
    private $lancamento_id;
    private $titulo;
    private $quantidade;
    private $valor_unitario;
    private $valor_total;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }

    public function getLancamentoId()
    {
        return $this->lancamento_id;
    }

    public function setLancamentoId($lancamento_id)
    {
        $this->lancamento_id = $lancamento_id;
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

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getValorUnitario()
    {
        return $this->valor_unitario;
    }

    public function setValorUnitario($valor_unitario)
    {
        $this->valor_unitario = $valor_unitario;
        return $this;
    }

    public function getValorTotal()
    {
        return $this->valor_total;
    }

    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
        return $this;
    }
    
}