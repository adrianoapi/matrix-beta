<?php

interface IColecaoItem
{
    public function getId();
    public function setId($id);
    public function getColecaoId();
    public function setColecaoId($colecao_id);
    public function getTitulo();
    public function setTitulo($titulo);
    public function getData();
    public function setData($data);
}