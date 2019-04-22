<?php



require_once 'Autoloader.php';

require_once 'Helper.php';



/**

 * Instanciamento de classes

 */

$db             = new Conn("localhost", "matrix", "root", "");
$login          = new Login();
$lancamento     = new Lancamento();
$grupo          = new Grupo();
$pagamento      = new Pagamento();
$lancamentoFixo = new LancamentoFixo();

$bojLogin          = new ServiceLogin($db, $login);
$objLancamento     = new ServiceLancamento($db, $lancamento);
$objGrupo          = new ServiceGrupo($db, $grupo);
$objPagamento      = new ServicePagamento($db, $pagamento);
$objLancamentoFixo = new ServiceLancamentoFixo($db, $lancamentoFixo);

$visible = FALSE;
$receita = $objLancamento->valor("E");
$despesa = $objLancamento->valor("S");
$graDesp = $objLancamento->graficoDebito();

if(!isset($_COOKIE['auth'])){
    if($_POST != NULL){
        $login->setLogin($_POST['login'])->setPassword($_POST['password']);
        if($bojLogin->autenticar()){
            setcookie("auth", true, 24 * time()+3600); 
            $visible = TRUE;
            #Template::header($objLancamentoFixo->show());
            Template::getFormLancamento($objGrupo->show(), $objPagamento->show(), $objLancamento->show(),  $objLancamentoFixo->show());
            #Template::getLancamento($objLancamento->show(), $receita, $despesa);
            #Template::footer();
        }
    }

    if($visible === FALSE){
        #Template::header(array());
        Template::getFormLogin();
        #Template::footer(); 
    }
}

if(isset($_COOKIE['auth'])){

/*
 * Add controller CRUD
 */
    if($_POST != NULL){

        if($_POST['action'] == 'delete_cliente'){

            $lancamento->setId($_POST['id']);
            print $objLancamento->delete();
            
        }elseif($_POST['action'] == 'salvar_lancamento_fixo'){
            if(!empty($_POST['pago'])){
                $iPago = array();
                foreach($_POST['pago'] as $key => $value):
                    array_push($iPago, $key);
                endforeach;

               $objLancamentoFixo->updateClear();
               $objLancamentoFixo->updatePago(implode(",", $iPago));
            }
           header('Location: ./');

        }elseif($_POST['action'] == 'pesquisar'){
            
            $lancamento->setGrupoId  ($_POST['grupo_id'                   ])
                    ->setPagamentoId ($_POST['pagamento_id'               ])
                    ->setDtInicio    (Helper::dataToSql($_POST['dt_inicio']))
                    ->setDtFim       (Helper::dataToSql($_POST['dt_fim'   ]));
                       
                // Apenas para tratar caracteres especiais
                $pesquisa = $_POST['grupo_id'] > 0 ? $objLancamento->pesquisar() : $objLancamento->pesquisarSemGrupo();
                $returnHtml = array();
                foreach($pesquisa as $key => $values):
                    foreach($values as $ind => $value):
                        $returnHtml[$key][$ind] = utf8_encode($value);
                    endforeach;
                endforeach;
                
                print json_encode($returnHtml);
                
        }elseif($_POST['action'] == 'save_lancamento'){

            $lancamento->setId       ($_POST['id'           ])
                    ->setGrupoId     ($_POST['grupo_id'     ])
                    ->setPagamentoId ($_POST['pagamento_id' ])
                    ->setValor       ($_POST['valor'        ])
                    ->setDtLancamento(Helper::dataToSql($_POST['dt_lancamento']))
                    ->setDescricao   (utf8_decode($_POST['descricao']));

            if($_POST['id'] > 0){
                print $objLancamento->update();
            }else{
                $id  = $objLancamento->save();
                $rst = $objLancamento->find($id);

                // Apenas para tratar caracteres especiais
                $returnHtml = array();
                if(count($rst) > 0){
                    foreach($rst[0] as $key => $value):
                        $returnHtml[$key] = utf8_encode($value);
                    endforeach;
                }
                print json_encode($returnHtml);
            }
        }

       
    }elseif($_GET != NULL){

        $rst = $objLancamento->find($_GET['id']);
        echo json_encode($rst[0]);

    }else{
        #Template::header($objLancamentoFixo->show());
        Template::getFormLancamento($objGrupo->show(), $objPagamento->show(), $objLancamento->show(), $objLancamentoFixo->show());
        #Template::getLancamento($objLancamento->show(), $receita, $despesa);
        #Template::footer();
    }
}

