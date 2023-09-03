<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
		$id=$_GET['id'];
	 ?>
	<script type="text/javascript">
		var confirmar=confirm("Deseja apagar o utilizador?");
		if (confirmar){
			window.location.href = "post-apagar.php?id="+<?php echo $id; ?>;
		}else{
			history.back();
		}
	</script>

</body>
</html>