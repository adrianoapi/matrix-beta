<?php

class Template
{
    
    public static function header()
    {
        return require __DIR__.'/header.php';
    }
    
    public static function getFormCliente()
    {
        return require __DIR__.'/cliente_form.php';
    }
    
    public static function getCliente(array $clientes)
    {
        return require __DIR__.'/cliente_listagem.php';
    }
    
    public static function getLancamento(array $grupos, array $pagamentos)
    {
        return require __DIR__.'/form_lancamento.php';
    }
    
    public static function footer()
    {
        return require __DIR__.'/footer.php';
    }

}