
<?php include_once 'api/view/top.php';?>

<div class="dashboard-main-wrapper">
    
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Media Objects</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
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
                        <h5 class="card-header">Basic Example of Media</h5>
                        <div class="card-body">
                            <div class="media">
                                <img class="mr-3 user-avatar-lg rounded" src="../assets/images/avatar-1.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <!--Mensagem de erro-->
                                    <div id="msg-erro" class="col-lg-12 alert alert-danger" style="display: none;">
                                        mensagem
                                    </div>

                                    <!--Mensagem de sucesso-->
                                    <div id="msg-success" class="col-lg-12 alert alert-success" style="display: none;">
                                        Registro efetuado com sucesso!
                                    </div>

                                    <form name="frm_login" id="frm_login" method="POST">
                                        <input type="hidden" name="action" value="save_login">
                                        <div class="form-row">
                                            <div class="col">
                                                <input class="form-control" type="text" name="login" id="login" value="" placeholder="login">
                                            </div>
                                            <div class="col">
                                                <input class="form-control" type="password" name="password" id="password" value="" placeholder="password">
                                            </div>
                                            <div class="col">
                                                <input type="submit" class="btn btn-primary" value="Autenticar">
                                            </div>
                                        </div>
                                    </form>
                                    
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


