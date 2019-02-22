<script src="_vendor/js/jquery.min.js   "></script>
<script src="_vendor/js/popper.min.js   "></script>
<script src="_vendor/js/bootstrap.min.js"></script>
<script src="_assets/js/custom.js       "></script>
<script>
    jQuery(document).ready(function(){
        
        // Cadastrar
        jQuery('#frm_cadastro').submit(function(){
            
           document.getElementById('msg-erro').style.display = "none";
           var dados = jQuery(this).serialize();
           var nome  = document.getElementById('nome' ).value;
           var email = document.getElementById('email').value;
           var valid = form_validtaion(nome, email);
           
           // Para a aplicação caso haja erro
           if(valid.length > 0){
               document.getElementById('msg-erro').innerHTML     = valid.join('<br>');
               document.getElementById('msg-erro').style.display = "block";
               return false;
           }
       
           jQuery.ajax({
               type: "POST",
               url:  "./",
               data: dados,
               success: function(data){
                   
                   if(data.length > 1){
                       
                       var obj = JSON.parse(data);
                       var id    = obj['id'   ];
                       var nome  = obj['nome' ];
                       var email = obj['email'];
                       
                       // Incrementa uma nova linha na tabela
                       $('<tr class="anim highlight"><td><input type="checkbox" name="cadastro[]"></td>' +
                           '<td>' + id    + '</td>' +
                           '<td><a href="javascript:void(0)" id="' + id + '" onClick="edit_row(this.id)" alt="clique alterar" title="clique alterar">' + nome + '</a></td>' +
                           '<td>' + email + '</td>' +
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
                       location.reload();
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
</div>
    </body>
</html>