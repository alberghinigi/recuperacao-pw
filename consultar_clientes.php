<?php
require_once("ControllerCadastro.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no"> <meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover"> <meta name="color-scheme" content="light dark"> 
	<link rel="stylesheet" href="bootstrap/css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script>
		function confirmDelete(delUrl) {
  			if (confirm("Deseja apagar o registro?")) {
   				document.location = delUrl;
   				//var url_string = "http://localhost/agendamento-mysql/" + delUrl;
				//var url = new URL(url_string);
				//var data = url.searchParams.get("id"); //pega o value
	        }  
		}
	</script>
	<title>Pizzaria</title>
</head> 
<body> 
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
				<a class="navbar-brand" href="#">Clientes</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cadastrar_clientes.php">Cadastrar</a>
						</li>
					</ul>
				</div>
			</nav>  
		</div>
		<div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body" style="margin: auto;">
					<table class="table table-responsive" style="width: auto;">
						<thead class="table-active bg-primary">
							<tr>
								<th class="th"scope="col">Nome</th>
								<th class="th"scope="col">Endereço</th>
								<th class="th"scope="col">Bairro</th>
								<th class="th"scope="col">CEP</th>
								<th class="th"scope="col">Cidade</th>
								<th class="th"scope="col">Estado</th>
								<th class="th"scope="col">Telefone</th>
								<th class="th"scope="col">Celular</th>
							</tr>
						</thead>
						<tbody id="TableData">
						<?php
							$controller = new ControllerClientes();
							$resultado = $controller->listar_clientes(0);
							//print_r($resultado);
							for($i=0;$i<count($resultado);$i++){ 
						?>
								<tr>
									<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['endereco']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['bairro']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['cep']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['cidade']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['estado']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['telefone']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['celular']; ?></td>
									<td scope="col">
										<button type="button" class="btn btn-outline-primary" onclick="location.href='editar_clientes.php?id=<?php echo $resultado[$i]['id']; ?>'" style="width: 72px;">Editar</button>
										<button type="button" class="btn btn-outline-primary" onclick="javascript:confirmDelete('excluir_clientes.php?id=<?php echo $resultado[$i]['id']; ?>')" style="width: 72px;">Excluir</button>
									</td>
								</tr>
						<?php
							}
						?>
						</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
