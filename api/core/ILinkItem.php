<?php

interface ILinkItem
{
    public function getId();
    public function setId($id);
    public function getLinkId();
    public function setLinkId($link_id);
    public function getTitulo();
    public function setTitulo($titulo);
    public function getUrl();
    public function setUrl($url);
    public function getData();
    public function setData($data);
}