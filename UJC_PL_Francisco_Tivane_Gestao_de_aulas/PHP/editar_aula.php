<?php
session_start();

// Conexão com o banco de dados
require_once 'conexao.php';

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o ID da aula foi fornecido
if (!isset($_GET["aula_id"])) {
    echo "ID da aula não fornecido.";
    exit();
}

// Obter o ID da aula a ser editada
$aula_id = $_GET["aula_id"];

$sql = "SELECT * FROM aulas WHERE aula_id = '$aula_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Aula não encontrada ou não pertence ao professor.";
    exit();
}

// Exibir o formulário de edição da aula
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Processar os dados enviados pelo formulário de edição
    
    $titulo = $_POST["titulo"];
    $data = $_POST["data"];
    $turma = $_POST["turma"];
    $disciplina = $_POST["disciplina"];
    
    // Atualizar os dados da aula no banco de dados
    $sql = "UPDATE aulas SET titulo = '$titulo', data = '$data', turma = '$turma', disciplina = '$disciplina' WHERE aula_id = '$aula_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Aula atualizada com sucesso!";
        header("Location: ../index.php");
    } else {
        echo "Erro ao atualizar a aula: " . $conn->error;
    }
    
    $conn->close();
} else {
    // Obter os dados da aula do banco de dados
    $row = $result->fetch_assoc();
    $titulo = $row["titulo"];
    $data = $row["data"];
    $turma = $row["turma"];
    $disciplina = $row["disciplina"];
    
    // Exibir o formulário de edição preenchido com os dados da aula
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Aula</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>
    <div id="top-bar">
    <div id="gestao">
        <?php
             {echo "Gestaão de Aulas" ;}
        ?>
    </div>
    <div id="nome-professor">
        <?php
            echo $_SESSION['nome'];  
        ?>
    </div>    
    </div>
    <div id="editar-form">
        <h2>Editar Aula</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"] . "?aula_id=" . $aula_id; ?>" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="<?php echo $data; ?>" required>

            <label for="turma">Turma:</label>
            <input type="text" id="turma" name="turma" value="<?php echo $turma; ?>" required>

            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina" value="<?php echo $disciplina; ?>" required>
            <br><br>
            <input type="submit" value="Atualizar">
        </form>
    </div>
    </body>
    <footer class="footer">
  <div class="container">
    <div class="logout-button">
      <form action="logout.php" method="POST">
        <input type="hidden" value="Ola">
        <input type="submit" value="Logout">
      </form>
    </div>
  </div>
</footer>
    </html>

    <?php
}

?>
