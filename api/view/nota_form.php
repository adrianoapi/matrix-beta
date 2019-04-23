
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
                    <div class="card-body">
                        <form name="frm_cadastro" id="frm_cadastro" method="POST">
                            <input type="hidden" name="action" value="save_nota">
                            <input type="hidden" name="id" id="id" value="">

                                <div class="email-head">
                                    <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
                                </div>
                                <div class="email-compose-fields">
                                    <div class="to cc">
                                        <div class="form-group row pt-2">
                                            <label class="col-md-1 control-label">Categoiria</label>
                                            <div class="col-md-11">
                                                <select class="js-example-basic-multiple" multiple="multiple">
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska" selected="selected">Alaska</option>
                                                    <option value="Melbourne">Melbourne</option>
                                                    <option value="Victoria" selected="selected">Victoria</option>
                                                    <option value="Newyork">Newyork</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subject">
                                        <div class="form-group row pt-2">
                                            <label class="col-md-1 control-label">Subject</label>
                                            <div class="col-md-11">
                                                <input name="titulo" id="titulo" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="email editor">
                                    <div class="col-md-12 p-0">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <textarea name="texto" class="form-control" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                                        </div>
                                    </div>
                                    <div class="email action-send">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-space" type="submit"><i class="icon s7-mail"></i> Send</button>
                                                <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic media -->
            <!-- ============================================================== -->
       
        </div>
            
             <!-- Optional JavaScript -->
            <script src="template/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
            <script src="template/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
            <script src="template/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
            <script src="template/assets/vendor/select2/js/select2.min.js"></script>
            <script src="template/assets/vendor/summernote/js/summernote-bs4.js"></script>
            <script src="template/assets/libs/js/main-js.js"></script>
            <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({ tags: true });
            });
            </script>
            <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 300

                });
            });
            </script>
        
        <?php include_once 'api/view/footer.php';?>
        <?php include_once 'api/view/botton.php';?>
        
    </div>
</div>