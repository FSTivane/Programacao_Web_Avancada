<?php 
	require_once "db-config.php";

	$q="update utilizador set nome=:nome, email=:email, perfil=:perfil, username=:username where id=:id";
	$criar=$db->prepare($q);
	$criar->bindParam(":id", $id);
	$criar->bindParam(":nome", $nome);
	$criar->bindParam(":email", $email);
	$criar->bindParam(":perfil", $perfil);
	$criar->bindParam(":username", $username);

	$id=$_POST['id'];
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$perfil=$_POST['perfil'];
	$username=$_POST['username'];

	if ($criar->execute()) {
		header("Location:index.php");
	}
 ?>