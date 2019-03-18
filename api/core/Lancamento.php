<?php

class Lancamento implements ILancamento
{

    private $id;
    private $grupo_id;
    private $pagamento_id;
    private $dt_lancamento;
    private $valor;
    private $descricao;
    private $dt_inicio;
    private $dt_fim;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }

    public function getGrupoId(){
        return $this->grupo_id;
    }

    public function setGrupoId($grupo_id){
        $this->grupo_id =  $grupo_id;
        return $this;
    }

    public function getPagamentoId()
    {
        return $this->pagamento_id;
    }

    public function setPagamentoId($pagamento_id)
    {
        $this->pagamento_id = $pagamento_id;
        return $this;
    }

    public function getDtLancamento()
    {
        return $this->dt_lancamento;
    }

    public function setDtLancamento($dt_lancamento)
    {
        $this->dt_lancamento = $dt_lancamento;
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
    
    public function getDtInicio()
    {
        return $this->dt_inicio;
    }
    
    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
        return $this;
    }
    
    public function getDtFim()
    {
        return $this->dt_fim;
    }
    
    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
        return $this;
    }
    
}