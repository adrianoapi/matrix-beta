<?php

$select_grupo = null;
foreach ($grupos as $value):
    $select_grupo .= "<option value=\"{$value['id']}\">".strtoupper($value['cod'])." - ".utf8_encode($value['titulo'])."</option>";
endforeach;

$select_pagamento = null;
foreach ($pagamentos as $value):
    $select_pagamento .= "<option value=\"{$value['id']}\">".strtoupper($value['cod'])." - ".utf8_encode($value['titulo'])."</option>";
endforeach;

?>


<!--Mensagem de erro-->
            <div id="msg-erro" class="col-lg-12 alert alert-danger" style="display: none;">
                mensagem
            </div>
            
            <!--Mensagem de sucesso-->
            <div id="msg-success" class="col-lg-12 alert alert-success" style="display: none;">
                Registro efetuado com sucesso!
            </div>
            
            <form name="frm_cadastro" id="frm_cadastro" method="POST" onsubmit="return false">
                <input type="hidden" name="action" value="save_lancamento">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-row">
                    <div class="col">
                        <input class="form-control" type="text" name="dt_lancamento" id="dt_lancamento" value="<?=date('d/m/Y')?>" placeholder="dt_lancamento">
                    </div>
                    <div class="col">
                        <select class="form-control" name="grupo_id" id="grupo_id"><?=$select_grupo?></select>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="descricao" id="descricao" value="teste" placeholder="descricao">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="valor" id="valor" value="10.00" placeholder="valor">
                    </div>
                    <div class="col">
                        <select class="form-control" name="pagamento_id" id="pagamento_id"><?=$select_pagamento?></select>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Salvar">
                    </div>
                </div>
            </form>