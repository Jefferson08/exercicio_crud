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

 ?>


 <html>
 <head>
 	<title>Listar</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 </head>
 <body>
 	
 		<div class="container-fluid">
 			
 			<hr>
 			<h2>Dados do Usuário:</h2>
 			<hr>

 			<ul class="list-group">
			  <li class="list-group-item">
			  		<h5>Nome:</h5><hr>
			  		<?php echo $user['nome']; ?>
			  </li>
			  <li class="list-group-item">
			  		<h5>Endereço:</h5><hr>
			  		<?php echo $user['endereco']; ?>
			  </li>
			  <li class="list-group-item">
			  		<h5>Telefone:</h5><hr>
			  		<?php echo $user['telefone']; ?>
			  </li>
			  <li class="list-group-item">
			  		<h5>Email:</h5><hr>
			  		<?php echo $user['email']; ?>
			  </li>
			  <li class="list-group-item">
			  		<h5>Sexo:</h5><hr>
			  		<?php echo $user['sexo']; ?>
			  </li>
			</ul>
 		</div>

 	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
 </body>
 </html>