<?php

class Cliente implements ICliente
{
    private $id;
    private $nome;
    private $email;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = is_numeric($id) ? $id : 0;
        return $this;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = strtolower($email);
        return $this;
    }
    
}