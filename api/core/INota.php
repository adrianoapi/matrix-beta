<?php

interface INota
{
    public function getId();
    public function setId($id);
    public function getTitulo();
    public function setTitulo($titulo);
    public function getTexto();
    public function setTexto($texto_id);
    public function getCategoriaId();
    public function setCategoriaId($categoria_id);
}