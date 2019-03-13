
<?php include_once 'api/view/top.php';?>

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

<div class="dashboard-main-wrapper">
    
    <?php include_once 'api/view/header.php';?>
    
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Media Object</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- basic media -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    
                                    <form name="frm_cadastro" id="frm_cadastro" method="POST" onsubmit="return false">
                                    <input type="hidden" name="action" value="save_lancamento">
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">Data lan�amento</label>
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

                                    <!--Mensagem de erro-->
                                    <div id="msg-erro" class="col-lg-12 alert alert-danger" style="display: none;">
                                    mensagem
                                    </div>

                                    <!--Mensagem de sucesso-->
                                    <div id="msg-success" class="col-lg-12 alert alert-success" style="display: none;">
                                    Registro efetuado com sucesso!
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic media -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- basic media -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Basic Example of Media</h5>
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Grupo</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Pgto</th>
                                                <th scope="col">ACAO</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            foreach($lancamentos as $lancamento):

                                                switch ($lancamento['pagamento_id']) {
                                                    case 5:
                                                        $label = 'success';
                                                        break;
                                                    case 1:
                                                        $label = 'primary';
                                                        break;
                                                    default:
                                                        $label = 'danger';
                                                        break;
                                                }
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="cadastro[]"></td>
                                                <td><?= Helper::dataToBr($lancamento['dt_lancamento']) ?></td>
                                                <td><?= utf8_encode($lancamento['grupo']) ?></td>
                                                <td><?= utf8_encode($lancamento['descricao' ]) ?></td>
                                                <td class="text-<?=$label?>"><?= $lancamento['valor' ] ?></td>
                                                <td><?= utf8_encode($lancamento['pagamento']) ?></td>
                                                <td>
                                                    <!--<input type="button" class="btn btn-primary " id="<?= $lancamento['id'] ?>" value="E" onClick="edit_row(this.id)">-->
                                                    <input type="button" class="btn btn-danger" id="<?= $lancamento['id'] ?>" value="Excluir" onClick="del_row(this.id,this)">
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr><td colspan="5"><input type="button" class="btn btn-danger" value="Excluir itens"></td></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic media -->
            <!-- ============================================================== -->
       
        </div>
       
        <?php include_once 'api/view/footer.php';?>
        
    </div>
</div>
