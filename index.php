<?php

require_once 'Autoloader.php';
require_once 'Helper.php';

/**
 * Instanciamento de classes
 */
$db            = new Conn("localhost", "matrix", "root", "");
$lancamento    = new Lancamento();
$grupo         = new Grupo();
$pagamento     = new Pagamento();

$objLancamento = new ServiceLancamento($db, $lancamento);
$objGrupo      = new ServiceGrupo($db, $grupo);
$objPagamento  = new ServicePagamento($db, $pagamento);

/*
 * Add controller CRUD
 */
if($_POST != NULL){

    if($_POST['action'] == 'delete_cliente'){
        
        $lancamento->setId($_POST['id']);
        print $objLancamento->delete();
        
    }else{
    
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

