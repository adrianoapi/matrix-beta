<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceLancamentoItem
{
    private $db;
    private $lancamentoItem;
    
    public function __construct(IConn $db, ILancamentoItem $lancamentoItem)
    {
        $this->db             = $db->connect();
        $this->lancamentoItem = $lancamentoItem;
    }
    
    
    public function getItensByLancamento()
    {
        $query = "SELECT * FROM lancamentos_item WHERE lancamento_id = :lancamento_id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":lancamento_id", $this->lancamentoItem->getLancamentoId());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
