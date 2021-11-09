<?php
require_once("ControllerCadastro.php");
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
				<a class="navbar-brand">Editar clientes</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="consultar_clientes.php">Cadastrar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body">
						<?php
							$controller = new ControllerClientes();
							$resultado = $controller->listar_clientes($_GET['id']);
							//print_r($resultado);
						?>
						<form method="post" action="ControllerCadastro.php?funcao=editar&id=<?php echo $resultado[0]['id']; ?>" id="form" name="form">
						<div class="form-group">
								<label for="exampleFormControlInput1">Nome:</label>
								<input type="text" class="form-control" name="txtNome" id="txtNome" value="<?php echo $resultado[0]['nome']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Endereço:</label>
								<input type="text" class="form-control" name="txtEndereco" id="txtEndereco" value="<?php echo $resultado[0]['endereco']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Bairro:</label>
								<input type="text" class="form-control" required name="txtBairro" id="txtBairro" value="<?php echo $resultado[0]['bairro']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">CEP:</label>
								<input type="int" class="form-control" required name="txtCEP" id="txtCEP" value="<?php echo $resultado[0]['cep']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Cidade:</label>
								<input type="text" class="form-control" required name="txtCidade" id="txtCidade" value="<?php echo $resultado[0]['cidade']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Estado:</label>
								<input type="text" class="form-control" required name="txtEstado" id="txtEstado" value="<?php echo $resultado[0]['estado']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Telefone:</label>
								<input type="int" class="form-control" required name="txtTelefone" id="txtTelefone" value="<?php echo $resultado[0]['telefone']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Celular:</label>
								<input type="int" class="form-control" required name="txtCelular" id="txtCelular" value="<?php echo $resultado[0]['celular']; ?>">
							</div>
							<button type="submit" id="btnInserir" class="btn btn-primary">Editar</button>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
