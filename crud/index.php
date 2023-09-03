<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utilizadores</title>
</head>
<body>
	<h2>Utilizadores</h2>
	<p>
		<a href="criar.php">Novo Utilizador</a>
	</p>
	<?php 
		require_once "db-config.php"; 
		$q="select * from utilizador";
		$stmt=$db->prepare($q);
		$stmt->execute();
		$utilizadores = $stmt->fetchAll(PDO::FETCH_OBJ);
	?>
	<table border="1" width="100%">
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Perfil</th>
			<th>Operacoes</th>
		</tr>
		<?php foreach ($utilizadores as $u){ ?>
		<tr>
			<td><?php echo $u->nome; ?></td>
			<td><?php echo $u->email; ?></td>
			<td><?php echo $u->perfil; ?></td>
			<td width="200px">
				<a href="ver.php?id=<?php echo $u->id; ?>">Ver</a>&nbsp;
				<a href="editar.php?id=<?php echo $u->id; ?>">Editar</a>&nbsp;
				<a href="apagar.php?id=<?php echo $u->id; ?>">Apagar</a>&nbsp;
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>