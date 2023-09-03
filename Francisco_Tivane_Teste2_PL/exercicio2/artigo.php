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

	$artigos=$db->prepare('select * from artigo where artigo.categoria=:id');
	$artigos->bindParam(':id',$_GET['id']);
    $artigos->execute();

	$menu_items=$artigos->fetchAll(PDO::FETCH_OBJ);
?> 
<div>
    
<p style="text-align: center; padding: 10px; margin-top:10px">
	<?php foreach ($menu_items as $item) { ?>
	<h2><?php echo $item->titulo; ?></h2>
    <div><?php echo $item->texto; ?></div>
	
	<?php } ?>

	
</p>
</div>
</body>
</html>