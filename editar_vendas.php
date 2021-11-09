<?php
require_once("ControllerVendas.php");
require_once("ControllerCadastro.php");
require_once("ControllerProdutos.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<meta name="color-scheme" content="light dark"> 
	<link rel="stylesheet" href="bootstrap/css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<title>Pizzaria</title>
</head> 
<body> 
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
				<a class="navbar-brand">Editar vendas</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cadastrar_vendas.php">Cadastrar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body">
						<?php
							$controller = new ControllerVendas();
							$resultado = $controller->listar_vendas($_GET['id']);
							//print_r($resultado);
						?>
						<form method="post" action="ControllerVendas.php?funcao=editar_vendas&id=<?php echo $resultado[0]['id']; ?>" id="form" name="form">
						<div class="form-group">
								<label for="exampleFormControlInput1">Cliente:</label>
								<select class="form-control" name="txtCliente" id="txtCliente" value="<?php echo $resultado[0]['nome']; ?>">
								<?php
								$controller = new ControllerClientes();
								$resultado = $controller->listar_clientes(0);
								//print_r($resultado);
								for($i=0;$i<count($resultado);$i++){ 
							?>
							<option>
							<?php 
							echo $resultado[$i]['nome']; 
							?>
							</option>
							<?php
							}
							?>
							</select>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Produto:</label>
								<select class="form-control" name="txtProduto" id="txtProduto" value="<?php echo $resultado[0]['nome']; ?>">
								<?php
								$controller = new ControllerProdutos();
								$resultado = $controller->listar_produtos(0);
								//print_r($resultado);
								for($i=0;$i<count($resultado);$i++){ 
							?>
							<option>
							<?php 
							echo $resultado[$i]['nome']; 
							?>
							</option>
							<?php
							}
							?>
							</select>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Data:</label>
								<input type="date" class="form-control" required name="txtData" id="txtData" value="<?php echo $resultado[0]['data']; ?>">
							</div>
							<div class="form-group">
								<!--<label for="file">Imagem:</label>
								<input type="file" class="form-control" required name="img" id="img">-->
                            </div>
                            <button type="submit" id="btnInserir" class="btn btn-primary" data-loading-text="Salvando...">Cadastrar</button>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
