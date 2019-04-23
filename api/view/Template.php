<?php

class Template
{
    
    public static function header(array $despesas)
    {
        return require __DIR__.'/header.php';
    }
    
    public static function getFormLogin()
    {
        return require __DIR__.'/login_form.php';
    }
    
    public static function getFormLancamento(array $grupos, array $pagamentos, array $lancamentos, array $fixos)
    {
        return require __DIR__.'/lancamento_form.php';
    }
    
    public static function getLancamento(array $lancamentos, $receita, $despesa)
    {
        return require __DIR__.'/lancamento_listagem.php';
    }
    
    public static function notaListagem(array $notas)
    {
        return require __DIR__.'/nota_listagem.php';
    }
    
    public static function notaAdicionar()
    {
        return require __DIR__.'/nota_form.php';
    }
    
    public static function footer()
    {
        return require __DIR__.'/footer.php';
    }

}