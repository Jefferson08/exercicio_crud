
<?php 
	
	require 'config.php';

		$sql = "SELECT * FROM users";

		$sql = $pdo->query($sql);

		$users = $sql->fetchAll();

		
 ?>

<html>
<head>
	<title>Exercício CRUD</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="container-fluid">

		<hr>
		<h1 class="h1">Exercício CRUD</h1>
		<hr>

		<a href="adicionar.php" class="btn btn-success">Adicionar</a>
		<hr>

		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Telefone</th>
						<th>Email</th>
						<th>Sexo</th>
						<th>Ação</th>
					</tr>

					<?php foreach($users as $user): ?>

						<tr>
							<td><?php echo $user['nome']; ?></td>
							<td><?php echo $user['endereco']; ?></td>
							<td><?php echo $user['telefone']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['sexo']; ?></td>
							
							
							<td id="acoes">
								<a href="listar.php?id=<?php echo $user['id']; ?>" class="btn btn-primary"><img src="assets/img/listar.PNG"></a>
								<a href="editar.php?id=<?php echo $user['id']; ?>" class="btn btn-warning"><img src="assets/img/editar.PNG"></a>
								<a href="excluir.php?id=<?php echo $user['id'] ?>" class="btn btn-danger"><img src="assets/img/excluir.PNG"></a>
							</td>
						</tr>

					<?php endforeach; ?>

				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>

</body>
</html>