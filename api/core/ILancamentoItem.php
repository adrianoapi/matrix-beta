<?php

interface ILancamentoItem
{
    public function getId();
    public function setId($id);
    public function getLancamentoId();
    public function setLancamentoId($lancamento_id);
    public function getTitulo();
    public function setTitulo($titulo);
    public function getQuantidade();
    public function setQuantidade($quantidade);
    public function getValorUnitario();
    public function setValorUnitario($valor_unitario);
    public function getValorTotal();
    public function setValorTotal($valor_total);
}