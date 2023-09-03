<?php 
	require_once "db-config.php";
	$id=$_GET['id'];
	$user=$db->prepare("select * from utilizador where id=:id");
	$user->bindParam(":id", $id); 
	$user->execute();
	$u=$user->fetch(PDO::FETCH_OBJ);
	$nome=$u->nome;
	$email=$u->email;
	$perfil=$u->perfil;
	$username=$u->username;
	$password=$u->password;
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $nome; ?></title>
</head>
<body>
	<h2><?php echo $nome; ?></h2>
	<hr>
	<table>
		<tr>
			<th style="text-align: right;">ID:</th>
			<td><?php echo $id; ?></td>
		</tr>
		<tr>
			<th style="text-align: right;">NOME:</th>
			<td><?php echo $nome; ?></td>
		</tr>
		<tr>
			<th style="text-align: right;">EMAIL:</th>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<th style="text-align: right;">PERFIL:</th>
			<td><?php echo $perfil; ?></td>
		</tr>
		<tr>
			<th style="text-align: right;">USERNAME:</th>
			<td><?php echo $username; ?></td>
		</tr>
	</table>
	<hr>

	<p>
		<a href="mudar-senha.php?id=<?php echo $u->id; ?>">Mudar Senha</a>&nbsp;
		<a href="editar.php?id=<?php echo $u->id; ?>">Editar</a>&nbsp;
		<a href="apagar.php?id=<?php echo $u->id; ?>">Apagar</a>&nbsp;
	</p>

</body>
</html>