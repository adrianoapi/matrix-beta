<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceLancamento
{
    private $db;
    private $lancamento;
    
    public function __construct(IConn $db, ILancamento $lancamento)
    {
        $this->db         = $db->connect();
        $this->lancamento = $lancamento;
    }
    
    public function find(int $id)
    {
        $query = "SELECT * FROM `lancamentos` WHERE `id`=:id LIMIT 1";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Listar lancamenots
     * @return type
     */
    public function show()
    {
        $query = "SELECT * FROM `lancamentos` ORDER BY id DESC limit 10";
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
        $query = "INSERT INTO `lancamentos` (`grupo_id`, `pagamento_id`, `dtLancamento`, `valor`, `descricao`) VALUES (:grupo_id, :pagamento_id, :dtLancamento, :valor, :descricao)";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":grupo_id",  $this->lancamento->getGrupoId());
        $stmt->bindValue(":pagamento_id",  $this->lancamento->getPagamentoId());
        $stmt->bindValue(":dtLancamento",  $this->lancamento->getDtLancamento());
        $stmt->bindValue(":valor",  $this->lancamento->getValor());
        $stmt->bindValue(":descricao", $this->lancamento->getDescricao());
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    /*public function save()
    {
        $query = "INSERT INTO `lancamentos` (`grupo_id`, `dt_lancamento`, `valor`, `descricao`) VALUES (:grupo_id, :pagamento_id, :dt_lancamento, :valor, :descricao)";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":pagamento_id",  $this->lancamento->getPagamentoId());
        $stmt->bindValue(":dt_lancamento",  $this->lancamento->getDtLancamento());
        $stmt->bindValue(":valor",  $this->lancamento->getValor());
        $stmt->bindValue(":descricao", $this->lancamento->getDescricao());
        $stmt->execute();
        return $this->db->lastInsertId();
    }*/
    
    /**
     * Atualiza registro
     * @return type
     */
    public function update()
    {
        $query = "UPDATE `lancamentos` SET `nome`=:nome, `email`=:email WHERE `id`=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id",    $this->lancamento->getId());
        $stmt->bindValue(":nome",  $this->lancamento->getNome());
        $stmt->bindValue(":email", $this->lancamento->getEmail());
        return $stmt->execute();
    }
    
    /**
     * Exclui registro na tabela
     * @return type
     */
    public function delete()
    {
        $query = "DELETE FROM `lancamentos` WHERE `id`=:id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->lancamento->getId());
        return $stmt->execute();
    }
    
}