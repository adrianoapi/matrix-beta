
<?php include_once 'api/view/top.php';

$select_grupo = "<option value=\"\">Selecione...</option>";
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
                    <?php
                    
                    $dtLancamento    = array();
                    $lancamentoTotal = array();
                    
                    $tempDespesas = array();
                    foreach($despesasCalculo as $value):
                        $tempDespesas[$value['dt_lancamento']] = $value['total'];
                        array_push($dtLancamento, $value['dt_lancamento']);
                    endforeach;
                    
                    $tempLucro = array();
                    foreach($lucroCalculo as $value):
                        $tempLucro[$value['dt_lancamento']] = $value['total'];
                        if(!in_array($value['dt_lancamento'], $dtLancamento)){
                            array_push($dtLancamento, $value['dt_lancamento']);
                        }
                    endforeach;
                    
                    foreach($dtLancamento as $value):
                        if(array_key_exists($value, $tempDespesas)){
                            $lancamentoTotal[$value]['despesa'] = $tempDespesas[$value];
                        }else{
                            $lancamentoTotal[$value]['despesa'] = 0;
                        }
                        if(array_key_exists($value, $tempLucro)){
                            $lancamentoTotal[$value]['lucro'] = $tempLucro[$value];
                        }else{
                            $lancamentoTotal[$value]['lucro'] = 0;
                        }
                    endforeach;
                    ?>
                    <div class="card">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="home-tab-grafico" data-toggle="tab" href="#home-grafico" role="tab" aria-controls="home" aria-selected="true">Gráfico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Lancar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false">Pesquisar</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="home-grafico" role="tabpanel" aria-labelledby="home-tab-grafico">
                                <div class="card">
                                    <div id="chart"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
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
                                      <label class="bmd-label-floating">Descri��o</label>
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
                            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                <form name="frm_pesquisa" id="frm_pesquisa" method="POST" onsubmit="return false">
                                    <input type="hidden" name="action" value="pesquisar">
                                <div class="row">
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Data In�cio</label>
                                      <input class="form-control" type="text" name="dt_inicio" id="dt_inicio" value="01/<?=date('m/Y')?>">
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Data Fim</label>
                                      <input class="form-control" type="text" name="dt_fim" id="dt_fim" value="31/<?=date('m/Y')?>">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Grupo</label>
                                      <select class="form-control" name="grupo_id" id="grupo_id"><?=$select_grupo?></select>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Pagamento</label>
                                      <select class="form-control" name="pagamento_id" id="pagamento_id"><?=$select_pagamento?></select>
                                    </div>
                                  </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Pesquisar">
                                <div class="clearfix"></div>
                                
                                </form>
                                
                                <table class="table table-hover" id="table_pesquisa">
                                        <thead class=" text-primary">
                                        <thead>
                                            <tr>
                                                <th scope="col">Data</th>
                                                <th scope="col">Grupo</th>
                                                <th scope="col">Valor</th>
                                            </tr>
                                        </thead>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
            
            <!-- ============================================================== -->
            <!-- basic media -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Registro de lançamentos</h5>
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body table-responsive-sm">
                                    <table class="table table-hover">
                                        <thead class=" text-primary">
                                        <thead>
                                            <tr>
                                                <th colspan="2" scope="col">Receita: R$ <?php echo number_format($receita[0][total], 2, ',', '.'); ?></th>
                                                <th colspan="2" scope="col">Despesa: R$ <?php echo number_format($despesa[0][total], 2, ',', '.'); ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Data</th>
                                                <th scope="col">Grupo</th>
                                                <th scope="col">Valor</th>
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
                                                        $posic = 'up';
                                                        break;
                                                    case 1:
                                                        $label = 'primary';
                                                        $posic = 'down';
                                                        break;
                                                    default:
                                                        $label = 'danger';
                                                        $posic = 'down';
                                                        break;
                                                }
                                        ?>
                                            <tr>
                                                <td><?= substr(Helper::dataToBr($lancamento['dt_lancamento']), 0, 5) ?></td>
                                                <td><span title="<?= utf8_encode($lancamento['descricao']) ?>"><?= utf8_encode($lancamento['grupo']) ?> <?= $lancamento['itens' ] > 0 ? 'itens ('. $lancamento['itens' ] .')' : '' ?></span></td>
                                                <td>
                                                    <span class="icon-circle-small icon-box-xs text-<?=$label?> ml-4 bg-<?=$label?>-light">
                                                        <i class="fa fa-fw fa-arrow-<?=$posic?>"></i>
                                                    </span>
                                                    <span class="ml-1 text-<?=$label?>"><?= $lancamento['valor' ] ?></span>
                                                </td>
                                                <td>
                                                    <a href="#" onClick="view_row(<?= $lancamento['id'] ?>)" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-light" id="<?= $lancamento['id'] ?>" value="Excluir" onClick="del_row(this.id,this)">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr><td colspan="5"><input type="button" class="btn btn-danger float-right" value="Excluir itens"></td></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body"></div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                <a href="#" class="btn btn-primary">Save changes</a>
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
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Despesas fixas</h5>
                                <div class="card-body">
                                    <form name="salvar_lancamento_fixo" id="salvar_lancamento_fixo" method="POST">
                                        <input name="action" type="hidden" value="salvar_lancamento_fixo">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Pgto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $totla = 0;
                                                foreach($fixos as $fixo):
                                                    $totla += $fixo['valor'];
                                                    switch ($fixo['pago']) {
                                                        case 0:
                                                            $label = 'primary';
                                                            break;
                                                        case 1:
                                                            $label = 'success';
                                                            break;
                                                    }
                                                
                                            ?>
                                                <tr>
                                                    <td><?= utf8_encode($fixo['descricao']) ?>
                                                        <br><small><?= substr(Helper::dataToBr($fixo['dt_vencimento']), 0, 5)  ?> - 
                                                            <?php 
                                                                $dias = Helper::calcularDias($fixo['dt_vencimento']); 
                                                                if($dias > 0 && $dias < 5){
                                                                    echo '<span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light ">'.$dias.'</span>';
                                                                }else{
                                                                    if(!$fixo['pago' ] && $dias == 0){
                                                                        echo '<span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light ">'.$dias.'</span>';
                                                                    }else{
                                                                        echo $dias;
                                                                    }
                                                                    
                                                                }
                                                            ?>
                                                                
                                                            </small>
                                                    </td>
                                                    <td class="text-<?=$label?>"><?= $fixo['valor' ] ?></td>
                                                    <td>
                                                        <label class="be-checkbox custom-control custom-checkbox">
                                                            <input type="checkbox" name="pago[<?= $fixo['id' ] ?>]" class="custom-control-input" <?= ($fixo['pago' ]) ? 'checked' : '' ?>><span class="custom-control-label"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>R$ <?= $totla ?></td>
                                                    <td colspan="2"><input type="submit" class="btn btn-sm btn-outline-light float-right" value="Salvar"></td></tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
            <!-- ============================================================== -->
            <!-- end basic media -->
            <!-- ============================================================== -->
       
        </div>
            
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>

            <?php
            $stringJS = '[';
            foreach($lancamentoTotal as $key => $value):
                $stringJS .= "{ y: '{$key}', lucro: {$value['lucro']}, medio: 146.67, despesa: {$value['despesa']} },";
            endforeach;
            $stringJS .= ']';
            ?>
          $(document).ready(function() {
            areaChart();

            $(window).resize(function() {
              window.areaChart.redraw();
            });
          });

        function areaChart() {
         Morris.Area({
            element: 'chart',
            data: <?php echo $stringJS; ?>,
            xkey: 'y',
            ykeys: ['lucro', 'medio', 'despesa'],
            labels: ['Lucro', 'Lucro Medio', 'Despesa'],
            fillOpacity: 0.4,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors: ['green', 'blue','red'],
          });
        }
        </script>
        
       
        
        <?php include_once 'api/view/footer.php';?>
        <?php include_once 'api/view/botton.php';?>
        
    </div>
</div>
