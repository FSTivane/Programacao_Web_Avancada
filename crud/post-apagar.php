<?php 
	require_once "db-config.php";

	$q="delete from utilizador where id=:id";
	$apagar=$db->prepare($q);
	$apagar->bindParam(":id", $id);

	$id=$_GET['id'];

	if ($apagar->execute()) {
		header("Location:index.php");
	}
 ?>