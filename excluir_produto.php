<?php
	require_once("ControllerProdutos.php");

	$controller = new ControllerProdutos();
	$resultado = $controller->excluir_produtos($_GET['id']);

?>