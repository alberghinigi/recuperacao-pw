<?php
	require_once("ControllerCadastro.php");

	$controller = new ControllerClientes();
	$resultado = $controller->excluir_clientes($_GET['id']);

?>