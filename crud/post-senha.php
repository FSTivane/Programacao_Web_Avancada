<?php
	require_once "db-config.php";

	$user=$db->prepare("select password from utilizador where id=:id");
	$user->bindParam(":id", $id); 
	$id=$_POST['id'];
	$user->execute();
	$u=$user->fetch(PDO::FETCH_OBJ);
	$old_password=$u->password;

	$q="update utilizador set password=:password where id=:id";
	$mudar_senha = $db->prepare($q);
	$mudar_senha->bindParam(":password", $new_password);
	$mudar_senha->bindParam(":id", $id);
	$new_password=$_POST["new_password"];
	$confirm=$_POST['conf_password'];
	$password=$_POST["password"];
	if ($old_password!=$password) {
		$err_1="Senha incorrecta";
	}elseif($new_password!=$confirm){
		$err_2="Senhas diferentes. Senha nao confirmada";
	}else{
		if ($mudar_senha->execute()) {
			header("Location:index.php");
		}
	}
 ?>