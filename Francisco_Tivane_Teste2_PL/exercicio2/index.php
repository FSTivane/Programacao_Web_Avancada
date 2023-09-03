<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
	include 'conexao.php';

	$categorias=$db->prepare('select * from categoria');
	$categorias->execute();

	$menu_items=$categorias->fetchAll(PDO::FETCH_OBJ);
?>
<p style="text-align: center; padding: 10px; background-color: #e0ef9e">
	<?php foreach ($menu_items as $item) { ?>
	<a style="display: inline-block; margin-right: 30px; text-decoration: none; color: black; font-size: 16px" href="exercicio2/artigos.php?id=<?php echo $item->id; ?>">
		<?php echo $item->nome; ?>
	</a>
	<?php } ?>

	
</p>
</body>
</html>