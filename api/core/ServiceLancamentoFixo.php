<?php

/**
 * Classe para manipulação de dados com o banco
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
        $query = "SELECT * FROM `lancamento_fixo` ORDER BY id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}