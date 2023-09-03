<?php
// Obter o ID da aula a ser excluída
$aula_id = $_GET["aula_id"];

// Conexão com o banco de dados
require_once 'conexao.php';

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se a aula pertence ao professor logado
//$id_professor = $_SESSION["id"]; // Defina o ID do professor com base no usuário autenticado

$sql = "SELECT aula_id FROM aulas WHERE aula_id = '$aula_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Aula encontrada, excluir do banco de dados
    $sql = "DELETE FROM aulas WHERE aula_id = '$aula_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Aula excluída com sucesso.";
        header("Location: ../index.php");
    } else {
        echo "Erro ao excluir aula: " . $conn->error;
    }
} else {
    echo "Aula não encontrada ou não pertence ao professor logado.";
}

$conn->close();
?>
