<?php
    require_once('libs/Smarty.class.php');
	$smarty = new Smarty();
	
	//$smarty->assign('var',$var);
	//
	include('includes/haut.inc.php');

	$smarty->display('temp.tpl');
	
	include('includes/bas.inc.php');
	

?>

