<?php
	require_once("ControllerVendas.php");

	$controller = new ControllerVendas();
	$resultado = $controller->excluir_vendas($_GET['id']);

?>