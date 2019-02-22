<?php

require_once 'Autoloader.php';
require_once 'Helper.php';

/**
 * Instanciamento de classes
 */
$db         = new Conn("localhost", "crud_php", "root", "");
$cliente    = new Cliente();
$objCliente = new ServiceCliente($db, $cliente);

/*
 * Add controller CRUD
 */

if(isset($_POST['action'] )){
    
    if($_POST['action'] == 'save_cliente'){
        
        $cliente->setId   ($_POST['id'   ])
                ->setNome ($_POST['nome' ])
                ->setEmail($_POST['email']);
        
        if($_POST['id'] > 0){
            print $objCliente->update();
                    
        }else{
            $id  = $objCliente->save();
            $rst = $objCliente->find($id);
            print json_encode($rst[0]);
        }
        
    }
    
    if($_POST['action'] == 'delete_cliente'){
        
        $cliente->setId($_POST['id']);
        print $objCliente->delete();
        
    }
    
}elseif($_GET != NULL){
    
    $rst = $objCliente->find($_GET['id']);
    echo json_encode($rst[0]);
    
}else{
    
    Template::header();
    Template::getFormCliente();
    Template::getCliente($objCliente->show());
    Template::footer();
    
}

