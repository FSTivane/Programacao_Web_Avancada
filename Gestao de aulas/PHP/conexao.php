<?php
$servername = "localhost";
$username = "root";
$password = "Melany3915";
$dbname = "aulas_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}
?>
