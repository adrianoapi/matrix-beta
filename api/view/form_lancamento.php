<!--Mensagem de erro-->
            <div id="msg-erro" class="col-lg-12 alert alert-danger" style="display: none;">
                mensagem
            </div>
            
            <!--Mensagem de sucesso-->
            <div id="msg-success" class="col-lg-12 alert alert-success" style="display: none;">
                Registro efetuado com sucesso!
            </div>
            
            <?php
            
            $select_grupo = NULL;
            foreach($grupos as $grupo):
                $select_grupo .= "<option value=\"{$grupo['id']}\">".$grupo['cod']." - ".utf8_encode($grupo['titulo'])."</option>";
            endforeach;
            
            ?>
            
            <form name="frm_cadastro" id="frm_cadastro" method="post" onsubmit="return false">
                <input type="hidden" name="action" value="save_cliente">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-row">
                    <div class="col">
                        <select name="grupo" class="form-control"><?=$select_grupo;?></select>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="nome" id="nome" value="" placeholder="nome">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="email" id="email" value="" placeholder="email">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        <input type="reset"  class="btn btn-default" value="Limpar" onclick="clear_form()">
                    </div>
                </div>
            </form>