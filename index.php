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
    
        $lancamento->setId       ($_POST['id'           ])
                ->setGrupoId     ($_POST['grupo_id'     ])
                ->setPagamentoId ($_POST['pagamento_id' ])
                ->setDtLancamento($_POST['dt_lancamento'])
                ->setValor       ($_POST['valor'        ])
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
   
    
}elseif($_GET != NULL){
    
    $rst = $objLancamento->find($_GET['id']);
    echo json_encode($rst[0]);
    
}else{
    
    Template::header();
    Template::getFormLancamento($objGrupo->show(), $objPagamento->show());
    Template::getLancamento($objLancamento->show());
    Template::footer();
    
}

