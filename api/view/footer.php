 <!-- your content here -->
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/template/assets/js/core/jquery.min.js"></script>
  <script src="/template/assets/js/core/popper.min.js"></script>
  <script src="/template/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="/template/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="/template/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/template/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/template/assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="/template/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });

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