<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceCliente
{
    private $db;
    private $cliente;
    
    public function __construct(IConn $db, ICliente $cliente)
    {
        $this->db      = $db->connect();
        $this->cliente = $cliente;
    }
    
    public function find(int $id)
    {
        $query = "SELECT * FROM `clientes` WHERE `id`=:id LIMIT 1";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Listar clientes
     * @return type
     */
    public function show()
    {
        $query = "SELECT * FROM `clientes` ORDER BY id DESC";
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
        $query = "INSERT INTO `clientes` (`nome`, `email`) VALUES (:nome, :email)";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":nome",  $this->cliente->getNome());
        $stmt->bindValue(":email", $this->cliente->getEmail());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
    /**
     * Atualiza registro
     * @return type
     */
    public function update()
    {
        $query = "UPDATE `clientes` SET `nome`=:nome, `email`=:email WHERE `id`=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id",    $this->cliente->getId());
        $stmt->bindValue(":nome",  $this->cliente->getNome());
        $stmt->bindValue(":email", $this->cliente->getEmail());
        return $stmt->execute();
    }
    
    /**
     * Exclui registro na tabela
     * @return type
     */
    public function delete()
    {
        $query = "DELETE FROM `clientes` WHERE `id`=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->cliente->getId());
        return $stmt->execute();
    }
    
}