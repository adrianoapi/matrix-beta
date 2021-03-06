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
    
    public function lucroCalculo()
    {
        $query = " SELECT SUM(valor) as total, dt_lancamento ".
                 " FROM `lancamentos` ".
                 " WHERE pagamento_id = 5 GROUP BY dt_lancamento order by dt_lancamento DESC ".
                 " LIMIT 4";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function despesasCalculo()
    {
        $query = " SELECT SUM(valor) as total, dt_lancamento ".
                 " FROM `lancamentos` ".
                 " WHERE pagamento_id = 4 GROUP BY dt_lancamento order by dt_lancamento DESC ".
                 " LIMIT 20";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function find(int $id)
    {
        $query = " SELECT la.*, gp.titulo AS grupo, pa.titulo AS pagamento    ".
                 " FROM       `lancamentos` AS la                             ".
                 " INNER JOIN `grupos`      AS gp ON (gp.id = la.grupo_id    )".
                 " INNER JOIN `pagamentos`  AS pa ON (pa.id = la.pagamento_id)".
                 " WHERE `la`.`id`=:id LIMIT 1";
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
        $query = "SELECT la.*, (SELECT COUNT(*) FROM lancamentos_item WHERE lancamento_id = la.id) as itens, gp.titulo AS grupo, pa.titulo AS pagamento
            FROM       `lancamentos` AS la                             
            INNER JOIN `grupos`      AS gp ON (gp.id = la.grupo_id    )
            INNER JOIN `pagamentos`  AS pa ON (pa.id = la.pagamento_id)
            ORDER BY la.dt_lancamento DESC limit 10";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Pesquisar lancamenots
     * @return type
     */
    public function pesquisar()
    {
        $query = " SELECT la.*, gp.titulo AS grupo, pa.titulo AS pagamento    ".
                 " FROM       `lancamentos` AS la                             ".
                 " INNER JOIN `grupos`      AS gp ON (gp.id = la.grupo_id    )".
                 " INNER JOIN `pagamentos`  AS pa ON (pa.id = la.pagamento_id)".
                 " WHERE la.grupo_id = :grupo_id AND la.pagamento_id = :pagamento_id AND la.dt_lancamento >= :dt_inicio AND la.dt_lancamento <= :dt_fim".
                 " ORDER BY la.id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":grupo_id",       $this->lancamento->getGrupoId());
        $stmt->bindValue(":pagamento_id",   $this->lancamento->getPagamentoId());
        $stmt->bindValue(":dt_inicio",      $this->lancamento->getDtInicio(), PDO::PARAM_STR);
        $stmt->bindValue(":dt_fim",         $this->lancamento->getDtFim(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function pesquisarSemGrupo()
    {
        $query = " SELECT la.*, gp.titulo AS grupo, pa.titulo AS pagamento    ".
                 " FROM       `lancamentos` AS la                             ".
                 " INNER JOIN `grupos`      AS gp ON (gp.id = la.grupo_id    )".
                 " INNER JOIN `pagamentos`  AS pa ON (pa.id = la.pagamento_id)".
                 " WHERE la.pagamento_id = :pagamento_id AND la.dt_lancamento >= :dt_inicio AND la.dt_lancamento <= :dt_fim".
                 " ORDER BY la.id DESC";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":pagamento_id",   $this->lancamento->getPagamentoId());
        $stmt->bindValue(":dt_inicio",      $this->lancamento->getDtInicio(), PDO::PARAM_STR);
        $stmt->bindValue(":dt_fim",         $this->lancamento->getDtFim(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Insere registro na tabela
     * @return type
     */
    public function save()
    {
        $query = "INSERT INTO `lancamentos` (`grupo_id`, `pagamento_id`, `dt_lancamento`, `valor`, `descricao`) VALUES (:grupo_id, :pagamento_id, :dt_lancamento, :valor, :descricao)";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":grupo_id",       $this->lancamento->getGrupoId());
        $stmt->bindValue(":pagamento_id",   $this->lancamento->getPagamentoId());
        $stmt->bindValue(":dt_lancamento",  $this->lancamento->getDtLancamento(), PDO::PARAM_STR);
        $stmt->bindValue(":valor",          $this->lancamento->getValor());
        $stmt->bindValue(":descricao",      $this->lancamento->getDescricao());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
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
    
    public function valor($tipo = 'S')
    {
        $query = " SELECT SUM(la.valor)      AS total ".
                 " FROM `lancamentos`        AS la".
                 " INNER JOIN `pagamentos`   AS pg ON (pg.id = la.pagamento_id)".
                 " INNER JOIN `grupos`	     AS gp ON (gp.id = la.grupo_id) ".
                 " WHERE pg.tipo = '{$tipo}' AND pg.id != 1".
                 " AND la.dt_lancamento >= '2010-03-01'";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
	
	public function graficoDebito()
	{
		$query =" SELECT    DATE(dt_lancamento) as DATE, SUM(CASE WHEN pagamento_id != 5 THEN 1 ELSE 0 END) AS Total".
				" FROM      `lancamentos`".
				" GROUP BY  DATE(dt_lancamento)".
				" ORDER BY dt_lancamento DESC".
				" LIMIT 5";
		$stmt  = $this->db->prepare($query);
        $stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
    
}
