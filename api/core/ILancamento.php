<?php

interface ILancamento
{
    public function getId();
    public function setId($id);
    public function getGrupoId();
    public function setGrupoId($grupo_id);
    public function getPagamentoId();
    public function setPagamentoId($pagamento_id);
    public function getDtLancamento();
    public function setDtLancamento($dt_lancamento);
    public function getValor();
    public function setValor($valor);
    public function getDescricao();
    public function setDescricao($descricao);
}