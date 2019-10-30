<?php
  
require_once 'Autoloader.php';

require_once 'Helper.php';



/**
 *
 * Instanciamento de classes
 *
 */

$db             = new Conn();
$login          = new Login();
$colecaoItem    = new ColecaoItem();

$bojColecaoItem = new ServiceColecaoItem($db, $colecaoItem);

$visible = FALSE;

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

	#echo "colecao <img src=\"/public/img/75.jpg\">";
	$revistas = $bojColecaoItem->show();
	
	$noImg = array();
		
	foreach($revistas as $revista):
		
		if (file_exists('./public/img/'.$revista['id'].'.jpg')) {
			echo '<img src="/public/img/'.$revista['id'].'.jpg" width="160" height="240">';
		}else{
			$noImg = array_merge($revista, $noImg);
		}
		
	endforeach;
	
	echo "<pre>";
	print_r($noImg);
	
}

