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

	$artigos=$db->prepare('select artigo.*,categoria.nome as cat from artigo join categoria on artigo.categoria=categoria.id where artigo.categoria=:id');
	$artigos->bindParam(':id',$_GET['id']);
    $artigos->execute();

	$menu_items=$artigos->fetchAll(PDO::FETCH_OBJ);
?> 
<div>
    
<p style="text-align: center; padding: 10px; background-color: #007ACC; margin-top:10px">
	<?php foreach ($menu_items as $item) { ?>
	<a style="display: inline-block; margin-right: 30px; text-decoration: none; color: black; font-size: 16px" href="artigo.php?id=<?php echo $item->id; ?>">
		<?php echo $item->titulo; ?>
	</a>
	<?php } ?>

	
</p>
</div>
</body>
</html>