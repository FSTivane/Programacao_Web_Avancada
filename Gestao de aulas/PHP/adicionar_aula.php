<?php
session_start();
    // Verificar se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $data = $_POST["data"];
    $data = date('Y-m-d');
    $turma = $_POST["turma"];
    $disciplina = $_POST["disciplina"];
    $id_professor =$_SESSION["id"] ; // Defina o ID do professor com base no usuário logado
    
    
    // Lógica para adicionar a aula ao banco de dados
    // Conexão com o banco de dados
    require_once 'conexao.php';

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Inserir aula no banco de dado
$sql = "INSERT INTO aulas (titulo, data, turma, disciplina, id_professor) VALUES ('$titulo', '$data', '$turma', '$disciplina', $id_professor)";

if ($conn->query($sql) === TRUE) {
    echo "Aula adicionada com sucesso.";
} else {
    echo "Erro ao adicionar aula: " . $conn->error;
}


$conn->close();

// Redirecionar para a página inicial
header("Location: ../index.php");
}
    ?>

    
