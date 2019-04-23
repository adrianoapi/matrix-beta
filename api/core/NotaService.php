<?php

class NotaService
{
    private $db;
    private $nota;
    
    public function __construct(IConn $db, INota $nota)
    {
        $this->db   = $db->connect();
        $this->nota = $nota;
    }
    
    public function show()
    {
        $query = "SELECT * FROM `notas` ORDER BY id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
     /**
     * Insere registro na tabela
     * @return type
     */
    public function save()
    {
        $query = "INSERT INTO `notas` (`titulo`, `texto`) VALUES (:titulo, :texto)";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":titulo", $this->nota->getTitulo());
        $stmt->bindValue(":texto",  $this->nota->getTexto());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
    /**
     * Atualiza registro
     * @return type
     */
    public function update()
    {
        $query = "UPDATE `notas` SET `titulo`=:titulo, `texto`=:texto WHERE `id`=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id",    $this->nota->getId());
        $stmt->bindValue(":nome",  $this->nota->getTitulo());
        $stmt->bindValue(":texto", $this->nota->getTexto());
        return $stmt->execute();
    }

    
}