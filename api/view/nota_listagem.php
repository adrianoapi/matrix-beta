
<?php include_once 'api/view/top.php';?>

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

            <div class="row">
            
            <!-- ============================================================== -->
            <!-- basic media -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Despesas fixas</h5>
                                <div class="card-body">
                                    <form name="salvar_lancamento_fixo" id="salvar_lancamento_fixo" method="POST">
                                        <input name="action" type="hidden" value="salvar_lancamento_fixo">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Título</th>
                                                    <th scope="col">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $total = 0;
                                                foreach($notas as $nota):
                                                    $total++;
                                            ?>
                                                <tr>
                                                    <td><?= utf8_encode($nota['titulo']) ?></td>
                                                    <td><?= $nota['data_criacao'] ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">Total <?= $total ?></td>
                                                </tr>
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
        
        <?php include_once 'api/view/footer.php';?>
        <?php include_once 'api/view/botton.php';?>
        
    </div>
</div>