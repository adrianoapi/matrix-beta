<?php

/**
 * Classe para manipulação de dados com o banco
 */
class ServiceLogin
{
    private $db;
    private $login;
    
    public function __construct(IConn $db, ILogin $login)
    {
        $this->db    = $db->connect();
        $this->login = $login;
    }
    
    
    
    /**
     * Listar pagamentos
     * @return type
     */
    public function autenticar()
    {
        $query = "SELECT * FROM `logins` WHERE `login`=:login AND `password`=:password";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(":login",    $this->login->getLogin(),    PDO::PARAM_STR);
        $stmt->bindValue(":password", $this->login->getPassword(), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}