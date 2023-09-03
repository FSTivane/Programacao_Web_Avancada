<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Permissao</title>
</head>
<body>

<php>
        



    </php>
    <php>
        if($SERVER['request method'])
            require_once "db_config.php";
            $nome= $POST['nome'];
            $email= $POST['email'];
            $senha= $POST['senha'];

        $q="insert into utilizador(nome, emial,senha)
        values(:nome,:emai,:senha)";

        $aduser=$db->prepare($q);
        $aduser=$db->bindparm(":nome",$nome)




    </php>
</body>
</html>