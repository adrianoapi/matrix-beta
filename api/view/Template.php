<?php

class Template
{
    
    public static function header()
    {
        return require __DIR__.'/header.php';
    }
    
    public static function getFormLancamento(array $grupos)
    {
        return require __DIR__.'/lancamento_form.php';
    }
    
    public static function getLancamento(array $lancamentos)
    {
        return require __DIR__.'/lancamento_listagem.php';
    }
    
    public static function footer()
    {
        return require __DIR__.'/footer.php';
    }

}