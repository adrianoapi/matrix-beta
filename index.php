<?php

require_once 'Autoloader.php';
require_once 'Helper.php';

/**
 * Instanciamento de classes
 */
$db            = new Conn("localhost", "matrix", "root", "");
$lancamento    = new Lancamento();
$objLancamento = new ServiceLancamento($db, $lancamento);

/*
 * Add controller CRUD
 */

if($_POST != NULL){
    
        $lancamento->setId       ($_POST['id'           ])
                ->setGrupoId     ($_POST['grupo_id'     ])
                ->setPagamentoId ($_POST['pagamento_id' ])
                ->setDtLancamento($_POST['dt_lancamento'])
                ->setValor       ($_POST['valor'        ])
                ->setDescricao   ($_POST['descricao'    ]);
       
        if($_POST['id'] > 0){
            print $objLancamento->update();
                    
        }else{
            $id  = $objLancamento->save();
            $rst = $objLancamento->find($id);
            print json_encode($rst[0]);
        }
   
    
}elseif($_GET != NULL){
    
    $rst = $objLancamento->find($_GET['id']);
    echo json_encode($rst[0]);
    
}else{
    
    Template::header();
    Template::getFormLancamento();
    Template::getLancamento($objLancamento->show());
    Template::footer();
    
}

