</div>
<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright � 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="template/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="template/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="template/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="template/assets/libs/js/main-js.js"></script>
    
    <script>
        jQuery(document).ready(function(){

        // Cadastrar
        jQuery('#frm_cadastro').submit(function(){

           document.getElementById('msg-erro').style.display = "none";
           var dados     = jQuery(this).serialize();
           var valor     = document.getElementById('valor'    ).value;
           var descricao = document.getElementById('descricao').value;
           //var valid = form_validtaion(nome, email);

           // Para a aplicação caso haja erro
           /*if(valid.length > 0){
               document.getElementById('msg-erro').innerHTML     = valid.join('<br>');
               document.getElementById('msg-erro').style.display = "block";
               return false;
           }*/

           jQuery.ajax({
               type: "POST",
               url:  "./",
               data: dados,
               success: function(data){

                   if(data.length > 1){

                       var obj       = JSON.parse(data);
                       var id        = obj['id'       ];
                       var valor     = obj['valor'    ];
                       var grupo     = obj['grupo'    ];
                       var pagamento = obj['pagamento'];
                       var descricao = obj['descricao'];
                       var date      = obj['dt_lancamento'];

                       // Incrementa uma nova linha na tabela
                       $('<tr class="anim highlight"><td><input type="checkbox" name="cadastro[]"></td>' +
                           '<td>' + date      + '</td>' +
                           '<td>' + grupo     + '</td>' +
                           '<td>' + descricao + '</td>' +
                           '<td>' + valor     + '</td>' +
                           '<td>' + pagamento + '</td>' +
                           '<td><input type="button" class="btnDelete btn btn-danger" id="' + id + '" onClick="del_row(this.id,this)" value="Excluir"></td></tr>')
                        .hide()
                        .prependTo('#lista_clientes > tbody')
                        .fadeIn("slow")
                        .addClass('normal');

                       /* OLD
                       var table = document.getElementById("lista_clientes");
                       var row   = table.insertRow(0);
                       var cell1 = row.insertCell(0);
                       var cell2 = row.insertCell(1);
                       var cell3 = row.insertCell(2);
                       var cell4 = row.insertCell(3);
                       var cell5 = row.insertCell(4);

                       cell1.innerHTML = '<input type="checkbox" name="cadastro[]">';
                       cell2.innerHTML = id;
                       cell3.innerHTML = '<a href="javascript:void(0)" id="' + id + '" onClick="edit_row(this.id)">' + nome + '</a>';
                       cell4.innerHTML = email;
                       cell5.innerHTML = '<input type="button" class="btn btn-danger" id="' + id + '" onClick="del_row(this.id,this)" value="Excluir">';
                       */

                       // Emite mensagem de sucesso
                       document.getElementById("frm_cadastro").reset();
                       document.getElementById("msg-success" ).style.display = "block";

                   }else{
                       //location.reload();
                   }

               }
           });

        });

    });

    // Limpar
    function clear_form(){
        document.getElementById("id").value = 0;
        document.getElementById("msg-erro"   ).style.display = "none";
        document.getElementById("msg-success").style.display = "none";
    }


    // Editar
    function edit_row(id){

        jQuery.ajax({
            type: "GET",
            url:  "./",
            data: "id=" + id,
            success: function(data){

                var obj = JSON.parse(data);

                if(obj['id'] > 0){
                    document.getElementById("id"   ).value = obj['id'   ];
                    document.getElementById("nome" ).value = obj['nome' ];
                    document.getElementById("email").value = obj['email'];
                }

            }
        });

    }

    // Excluir
    function del_row(id, element){

        var tr  = $(element).closest('tr');
        var rst = confirm("Deseja relamente excluir o item " + id + " ?");

        if(rst == true){

            jQuery.ajax({
                type: "POST",
                url:  "./",
                data: "action=delete_cliente&id=" + id,
                success: function(data){
                    if(data > 0){
                            tr.css("background-color", "#FF8080");
                            tr.css("color", "#FFFFFF");
                            tr.fadeOut(500, function(){
                                tr.remove();
                            });
                    }
                }
            });

        }

    }
    </script>
</body>
 
</html>