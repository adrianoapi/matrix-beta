<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceColecaoItem
{
    private $db;
    private $colecaoItem;
    
    public function __construct(IConn $db, IColecaoItem $colecaoItem)
    {
        $this->db          = $db->connect();
        $this->colecaoItem = $colecaoItem;
    }
    
    
    
    /**
     * Listar grupos
     * @return type
     */
    public function show()
    {
        $query = "SELECT * FROM `colecao_item` ORDER BY colecao_id, data desc";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}