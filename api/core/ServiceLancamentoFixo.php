<?php

/**
 * Classe para manipula��o de dados com o banco
 */
class ServiceLancamentoFixo
{
    private $db;
    private $lacamentoFixo;
    
    public function __construct(IConn $db, ILancamentoFixo $lacamentoFixo)
    {
        $this->db            = $db->connect();
        $this->lacamentoFixo = $lacamentoFixo;
    }
    
    public function show()
    {
        $query = "SELECT * FROM `lancamento_fixo` ORDER BY pago, dt_vencimento ASC";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function updatePago($id)
    {
        $query = "UPDATE `lancamento_fixo` SET pago = 1 WHERE id IN ({$id})";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function updateClear()
    {
        $query = "UPDATE `lancamento_fixo` SET pago = 0 WHERE id > 0";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}