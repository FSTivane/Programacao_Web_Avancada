<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestao de Aulas</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    
        <?php
        if (isset($_SESSION["logged_in"]) ) {
            if($_SESSION["logged_in"]=== true){  echo "<style> #aulas-list, #aulas-form{ display:block; } #testes, #login-form{display:none;} </style>";}
        }
        ?>
   

</head>
<body>
<div id="top-bar">
    <div id="gestao">
        <?php
             if (isset($_SESSION["logged_in"]) ) {echo "Gestaão de Aulas" ;}
        ?>
    </div>
    <div id="nome-professor">
        <?php
        //session_start();
        if (isset($_SESSION['nome'])) {
            echo $_SESSION['nome'];  
        }
        ?>
        </div>    
</div>

<?php
     
     if (!isset($_SESSION["logged_in"])) {
         echo "<style>.footer,.content, #top-bar{ display: none; } </style>";
     }
    ?>
    <div id="login-form">
        <h2>Login</h2>
        <form action="PHP/login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
     <div id="testes">
        <h2 >Professores cadastrados para fins de teste</h2>
        
            <?php include 'PHP/horario.php';?>
    </div>
  

    <div class="content">
    <div id="aulas-form">
    
        <h2>Agengar Aulas</h2>
        <form action="PHP/adicionar_aula.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>

            <label for="turma">Turma:</label>
            <input type="text" id="turma" name="turma" required>

            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina" required>
            <br><br>
            <input type="submit" name="submit" value="Adicionar Aula">
        </form>
    </div>
    <div class="cont" >
    <div id="aulas-list" >
        <h2>Plano Semanal</h2>
        
            
            <?php include 'PHP/aulas_semana.php';?>
        
    </div>
    <div id="aulas-list" >
        <h2>Aulas Agendadas</h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Data</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Acções</th>
            </tr>
            <?php include 'PHP/listar_aula.php';?>
        </table>
    </div>
    </div>
    </div>
    <footer class="footer">
  <div class="container">
    <div class="logout-button">
      <form action="PHP/logout.php" method="POST">
        <input type="hidden" value="Ola">
        <input type="submit" value="Logout">
      </form>
    </div>
  </div>
</footer>
</body>

