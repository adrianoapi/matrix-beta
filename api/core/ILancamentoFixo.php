<?php

interface ILancamentoFixo
{
    public function getId();
    public function setId($id);
    public function getDescricao();
    public function setDescricao($descricao);
    public function getValor();
    public function setValor($valor);
}