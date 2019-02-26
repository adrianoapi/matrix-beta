<?php

class Template
{
    
    public static function header()
    {
        return require __DIR__.'/header.php';
    }
    
    public static function getFormLogin()
    {
        return require __DIR__.'/login_form.php';
    }
    
    public static function getFormLancamento(array $grupos, array $pagamentos)
    {
        return require __DIR__.'/lancamento_form.php';
    }
    
    public static function getLancamento(array $lancamentos, $receita, $despesa)
    {
        return require __DIR__.'/lancamento_listagem.php';
    }
    
    public static function footer()
    {
        return require __DIR__.'/footer.php';
    }

}