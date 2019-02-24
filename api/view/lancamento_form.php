<?php

$select_grupo = null;
foreach ($grupos as $value):
    $select_grupo .= "<option value=\"{$value['id']}\">".utf8_encode($value['titulo'])."</option>";
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
                <input type="hidden" name="action" value="save_cliente">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-row">
                    <div class="col">
                        <input class="form-control" type="text" name="dt_lancamento" id="dt_lancamento" value="2019-02-23" placeholder="dt_lancamento">
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
                        <input class="form-control" type="text" name="pagamento_id" id="pagamento_id" value="4" placeholder="pagamento">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        <input type="reset"  class="btn btn-default" value="Limpar" onclick="clear_form()">
                    </div>
                </div>
            </form>