<?php

interface IPagamento
{
    public function getId();
    public function setId($id);
    public function getCod();
    public function setCod($cod);
    public function getTipo();
    public function setTipo($tipo);
    public function getTitulo();
    public function setTitulo($titulo);
}