<?php
  
require_once 'Autoloader.php';

require_once 'Helper.php';



/**
 *
 * Instanciamento de classes
 *
 */

$db          = new Conn("localhost", "matrix", "adriano", "201187");
$login       = new Login();
$linkItem    = new linkItem();

$objLinkItem 	= new ServiceLinkItem($db, $linkItem);

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
	$revistas = $objLinkItem->show();
	
	$noImg = array();
		
	echo '<table border="1">';

	$old = NULL;
	$categoria = NULL;
	$i=0;
	foreach($revistas as $revista):

		if($revista['categoria_titulo'] == $old){
			$i++;
		}

		$categoria = $revista['categoria_titulo'] == $old ? '' : $revista['categoria_titulo'];
		$old = $revista['categoria_titulo'];
		echo '<tr>';
		echo '<td>'.$categoria.'</td>';
		echo '<td><a href="'.$revista['url'].'" target="_blank">'.$revista['titulo'].'</a></td>';
		echo '</tr>';
	endforeach;

	echo '</table>';
	
	echo "<pre>";
	print_r($noImg);
	
}

