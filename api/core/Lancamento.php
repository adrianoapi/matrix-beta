<?php

/**
 * Track posting actions
 * @var Lancamento $lancamento
 */
class Lancamento implements ILancamento
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $grupo_id;

    /**
     * @var int
     */
    private $pagamento_id;

    /**
     * @var date
     */
    private $dt_lancamento;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var date
     */
    private $dt_inicio;

    /**
     * @var date
     */
    private $dt_fim;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Assigns value to $id
     * @param int $id
     * 
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupoId(){
        return $this->grupo_id;
    }

    /**
     * Assigns value to $grupo_id
     * @param int $grupo_id
     * 
     * @return int $grupo_id
     */
    public function setGrupoId($grupo_id){
        $this->grupo_id =  $grupo_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPagamentoId()
    {
        return $this->pagamento_id;
    }

    /**
     * Assigns value to $pagamento_id
     * @param int $pagamento_id
     * 
     * @return int $pagamento_id
     */
    public function setPagamentoId($pagamento_id)
    {
        $this->pagamento_id = $pagamento_id;
        return $this;
    }

    /**
     * @return $dt_lancamento
     */
    public function getDtLancamento()
    {
        return $this->dt_lancamento;
    }

    /**
     * Assigns value to $pagamento_id
     * @param date $pagamento_id
     * 
     * @return date $pagamento_id
     */
    public function setDtLancamento($dt_lancamento)
    {
        $this->dt_lancamento = $dt_lancamento;
        return $this;
    }

    /**
     * @return $valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Assigns value to $valor
     * @param float $valor
     * 
     * @return float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string $descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Assigns value to $descricao
     * @param string $descricao
     * 
     * @return string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
    
    /**
     * @return $dt_inicio
     */
    public function getDtInicio()
    {
        return $this->dt_inicio;
    }
    
    /**
     * Assigns value to $dt_inicio
     * @param date $dt_inicio
     * 
     * @return date $dt_inicio
     */
    public function setDtInicio($dt_inicio)
    {
        $this->dt_inicio = $dt_inicio;
        return $this;
    }
    
    /**
     * @return date $dt_fim
     */
    public function getDtFim()
    {
        return $this->dt_fim;
    }
    
    /**
     * Assigns value to $dt_fim
     * @param date $dt_fim
     * 
     * @return date $dt_fim
     */ 
    public function setDtFim($dt_fim)
    {
        $this->dt_fim = $dt_fim;
        return $this;
    }
    
}