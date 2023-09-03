<?php

// Conexão com o banco de dados
require_once 'conexao.php';

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Buscar as aulas do professor com base no ID do professor
$id_professor = $_SESSION["id"]; // Defina o ID do professor com base no usuário autenticado

$sql = "SELECT * FROM aulas WHERE id_professor = $id_professor";
$result = $conn->query($sql);
if (!$result) {
    echo "Erro na consulta: " . $conn->error;
}


if ($result->num_rows > 0) {
    // Exibir as aulas em uma tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["titulo"]."</td>";
        echo "<td>".$row["data"]."</td>";
        echo "<td>".$row["turma"]."</td>";
        echo "<td>".$row["disciplina"]."</td>";
        echo "<td><a href='PHP/editar_aula.php?aula_id=".$row["aula_id"]."'>Editar</a> | <a href='PHP/excluir_aula.php?aula_id=".$row["aula_id"]."'>Excluir</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhuma aula encontrada.</td></tr>";
}

$conn->close();
?>
