<?php

require_once 'Autoloader.php';
require_once 'Helper.php';

/**
 * Instanciamento de classes
 */
$db            = new Conn("localhost", "matrix", "root", "");
$login         = new Login();
$lancamento    = new Lancamento();
$grupo         = new Grupo();
$pagamento     = new Pagamento();

$bojLogin      = new ServiceLogin($db, $login);
$objLancamento = new ServiceLancamento($db, $lancamento);
$objGrupo      = new ServiceGrupo($db, $grupo);
$objPagamento  = new ServicePagamento($db, $pagamento);

$visible = FALSE;

if(!isset($_COOKIE['auth'])){
    if($_POST != NULL){

        $login->setLogin($_POST['login'])->setPassword($_POST['password']);

        if($bojLogin->autenticar()){
            setcookie("auth", true, time()+3600); 
            $visible = TRUE;
            Template::header();
            Template::getFormLancamento($objGrupo->show(), $objPagamento->show());
            Template::getLancamento($objLancamento->show());
            Template::footer();
        }
    }
    if($visible === FALSE){
        Template::header();
        Template::getFormLogin();
        Template::footer(); 
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
                foreach($rst[0] as $key => $value):
                    $returnHtml[$key] = utf8_encode($value);
                endforeach;

                print json_encode($returnHtml);
            }
        }
       
        
    }elseif($_GET != NULL){
        
        $rst = $objLancamento->find($_GET['id']);
        echo json_encode($rst[0]);
        
    }else{
        
        Template::header();
        Template::getFormLancamento($objGrupo->show(), $objPagamento->show());
        Template::getLancamento($objLancamento->show());
        Template::footer();
        
    }
}
