<?php 
	require_once "db-config.php";

	$q="insert into utilizador (nome, email, perfil, username, password) values (:nome, :email, :perfil, :username, :password)";
	$criar=$db->prepare($q);
	$criar->bindParam(":nome", $nome);
	$criar->bindParam(":email", $email);
	$criar->bindParam(":perfil", $perfil);
	$criar->bindParam(":username", $username);
	$criar->bindParam(":password", $password);

	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$perfil=$_POST['perfil'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	if ($criar->execute()) {
		header("Location:index.php");
	}
 ?>