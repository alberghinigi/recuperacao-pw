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
				<a class="navbar-brand" href="cadastras_clientes.php">Cadastrar clientes</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="consultar_clientes.php">Consultar clientes</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body">
						<form method="post" action="ControllerCadastro.php?funcao=clientes" id="form" name="form">
							<div class="form-group">
								<label for="exampleFormControlInput1">Nome:</label>
								<input type="text" class="form-control" name="txtNome" id="txtNome">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Endereço:</label>
								<input type="text" class="form-control" name="txtEndereco" id="txtEndereco">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Bairro:</label>
								<input type="text" class="form-control" required name="txtBairro" id="txtBairro">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">CEP:</label>
								<input type="int" class="form-control" required name="txtCEP" id="txtCEP">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Cidade:</label>
								<input type="text" class="form-control" required name="txtCidade" id="txtCidade">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Estado:</label>
								<input type="text" class="form-control" required name="txtEstado" id="txtEstado">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Telefone:</label>
								<input type="int" class="form-control" required name="txtTelefone" id="txtTelefone">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Celular:</label>
								<input type="int" class="form-control" required name="txtCelular" id="txtCelular">
							</div>
							<button type="submit" id="btnInserir" class="btn btn-primary">Cadastrar</button>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
