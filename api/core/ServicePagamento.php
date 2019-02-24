<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServicePagamento
{
    private $db;
    private $pagamento;
    
    public function __construct(IConn $db, IPagamento $pagamento)
    {
        $this->db        = $db->connect();
        $this->pagamento = $pagamento;
    }
    
    
    
    /**
     * Listar pagamentos
     * @return type
     */
    public function show()
    {
        $query = "SELECT * FROM `pagamentos` ORDER BY id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}