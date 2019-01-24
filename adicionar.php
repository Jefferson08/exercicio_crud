<?php 
	
	require 'config.php';
	
	if (isset($_POST['nome'])) {
		if (!empty($_POST['nome']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['sexo'])) {

			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$email = $_POST['email'];
			
			if ($_POST['sexo'] == 1) {
				$sexo = "masc";
			} else {
				$sexo = "fem";
			}

			$sql = "INSERT INTO users SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, sexo = :sexo";

			$sql = $pdo->prepare($sql);

			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":sexo", $sexo);

			$sql->execute();

			header("Location: index.php");
			
		} else {
			?>
				<div class="alert alert-warning">Preencha todos os campos!!!</div>
			<?php
		}
	}
 ?>

<html>
<head>
	<title>Adicionar Usuário</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>


<body>

	<div class="container-fluid">
		
		<hr>
		<h2>Adicionar Usuário</h1>
		<hr>

		<div class="row">
			<div class="col-sm-5">
				
				<form method="POST">
			
					<div class="form-group">
						<label for="nome">Nome:</label>
						<input type="text" name="nome" class="form-control">
					</div>

					<div class="form-group">
						<label for="endereco">Endereço:</label>
						<input type="text" name="endereco" class="form-control">
					</div>

					<div class="form-group">
						<label for="telefone">Telefone:</label>
						<input type="text" name="telefone" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<select class="form-control" name="sexo">
							<option value="1" selected>Masculino</option>
							<option value="2">Feminino</option>
						</select>
					</div>

					<hr>

					<input type="submit" value="Adicionar" class="btn btn-primary" name="adicionar">
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
</body>
</html>