<?php 
	
	$conn = "mysql:dbname=exercicio_crud;host=localhost";
	$user = "root";
	$pass = "";


	try {

		$pdo = new PDO($conn, $user, $pass);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e) {
		echo "Erro: ".$e->getMessage();
	}
 ?>