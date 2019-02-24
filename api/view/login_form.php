

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