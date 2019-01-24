<?php 

	require 'config.php';
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "DELETE FROM users WHERE id = :id";
		$sql = $pdo->prepare($sql);

		$sql->bindValue(":id", $id);
		$sql->execute();

		header("Location: index.php");
	}
 ?>