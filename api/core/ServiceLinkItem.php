<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceLinkItem
{
    private $db;
    private $linkItem;
    
    public function __construct(IConn $db, IlinkItem $linkItem)
    {
        $this->db          = $db->connect();
        $this->linkItem = $linkItem;
    }
    
    
    
    /**
     * Listar grupos
     * @return type
     */
    public function show()
    {
        $query = "SELECT categoria.titulo categoria_titulo, item.* FROM `link_item` AS item 
                    INNER JOIN `link` AS categoria ON (item.link_id = categoria.id)
                    ORDER BY link_id, date desc";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}