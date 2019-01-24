
<?php 
	
	require 'config.php';

	if (!empty($_GET['id'])) {
		
		$id = $_GET['id'];

		$sql = "SELECT * FROM users WHERE id = :id";

		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			
			$user = $sql->fetch();

		} else {
			header("Location: index.php");
		}

	} 

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

			$sql = "UPDATE users SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, sexo = :sexo WHERE id = :id";

			$sql = $pdo->prepare($sql);

			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":sexo", $sexo);
			$sql->bindValue(":id", $user['id']);

			$sql->execute();

			header("Location: index.php");
			exit;
			
		} else {
			?>
				<div class="alert alert-warning">Preencha todos os campos!!!</div>
			<?php
		}
	}

	
 ?>

 <html>
<head>
	<title>Editar Usuário</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>


<body>

	<div class="container-fluid">
		
		<hr>
		<h2>Editar Usuário</h1>
		<hr>

		<div class="row">
			<div class="col-sm-5">
				
				<form method="POST">
			
					<div class="form-group">
						<label for="nome">Nome:</label>
						<input type="text" name="nome" class="form-control" value="<?php echo $user['nome']; ?>">
					</div>

					<div class="form-group">
						<label for="endereco">Endereço:</label>
						<input type="text" name="endereco" class="form-control" value="<?php echo $user['endereco']; ?>">
					</div>

					<div class="form-group">
						<label for="telefone">Telefone:</label>
						<input type="text" name="telefone" class="form-control" value="<?php echo $user['telefone']; ?>">
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
					</div>

					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<select class="form-control" name="sexo">
							<option value="1" <?php echo ($user['sexo'] == "masc") ? "selected" : ""; ?>>Masculino</option>
							<option value="2" <?php echo ($user['sexo'] == "fem") ? "selected" : ""; ?>>Feminino</option>
						</select>
					</div>

					<hr>

					<input type="submit" value="Salvar" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
</body>
</html>