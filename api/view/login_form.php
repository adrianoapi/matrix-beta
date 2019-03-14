
<?php include_once 'api/view/top.php';?>

 <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#><img class="logo-img" src="template/assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form name="frm_login" id="frm_login" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="login" id="login" value="" placeholder="login" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" value="" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>    
       
        <?php #include_once 'api/view/button.php';?>


