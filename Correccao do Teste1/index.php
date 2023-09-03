<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>
        <a href="adicionar-permissao.php">Novo utilizador</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
    </p>


    <p>
        <a href="adicionar-user.php">Novo utilizador</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
    </p>

    <?php
        require_once "db-config.php";
        $utilizador=$db->query("select 8 from utilizador")->fetchAll(PDO::FETCH_OBJ);
    ?>


</body>
</html>