<?php

interface ICliente
{
    public function getId();
    public function setId($id);
    public function getNome();
    public function setNome($nome);
    public function getEmail();
    public function setEmail($email);
}