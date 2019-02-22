<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceGrupo
{
    private $db;
    private $grupo;
    
    public function __construct(IConn $db, IGrupo $grupo)
    {
        $this->db      = $db->connect();
        $this->cliente = $grupo;
    }
    
    
    /**
     * Listar clientes
     * @return type
     */
    public function show()
    {
        $query = "SELECT * FROM `grupos` ORDER BY id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}