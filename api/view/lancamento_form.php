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
            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Registrar lançamento</h4>
                </div>
                <div class="card-body">
                  <form name="frm_cadastro" id="frm_cadastro" method="POST" onsubmit="return false">
                    <input type="hidden" name="action" value="save_lancamento">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Data Lançamento</label>
                          <input class="form-control" type="text" name="dt_lancamento" id="dt_lancamento" value="<?=date('d/m/Y')?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Grupo</label>
                          <select class="form-control" name="grupo_id" id="grupo_id"><?=$select_grupo?></select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Descrição</label>
                          <input class="form-control" type="text" name="descricao" id="descricao" value="teste">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Valor</label>
                          <input class="form-control" type="text" name="valor" id="valor" value="10.00">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pagamento</label>
                          <select class="form-control" name="pagamento_id" id="pagamento_id"><?=$select_pagamento?></select>
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-3">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-3">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
