<?php
	require_once "db-config.php";
	$id=$_GET['id'];
	$user=$db->prepare("select * from utilizador where id=:id");
	$user->bindParam(":id", $id); 
	$user->execute();
	$u=$user->fetch(PDO::FETCH_OBJ);
	$nome=$u->nome;
	$email=$u->email;
	global $perfil;
	$perfil=$u->perfil;
	$username=$u->username;
	$password=$u->password;
	$post_file="post-editar.php";
	require_once "_form.php";
 ?>