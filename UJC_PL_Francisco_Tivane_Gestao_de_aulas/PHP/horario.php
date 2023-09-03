<?php
// Conexão com o banco de dados
require_once 'conexao.php';

// Query para buscar todos os professores
$sql = "SELECT * FROM professor";
$result = $conn->query($sql);

// Verificar se algum resultado foi retornado
if ($result->num_rows > 0) {
    // Exibir os dados de cada professor
    echo "<h2>Lista de Professores</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["senha"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum professor encontrado.";
}

?>
