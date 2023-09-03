<?php

session_start();
// Conexão com o banco de dados
require_once 'conexao.php';


// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Recuperar as informações do formulário
	$email = $_POST["email"];
    $password = $_POST["password"];

	// Verificar se as informações de login estão corretas
	$sql = "SELECT id, nome FROM professor WHERE email = '$email' AND senha = '$password'";
	$resultado = mysqli_query($conn, $sql);
	if (mysqli_num_rows($resultado) == 1) {
		// As informações de login estão corretas, criar a sessão de usuário
		$dados_usuario = mysqli_fetch_assoc($resultado);
		$_SESSION['id'] = $dados_usuario['id'];
		$_SESSION['nome'] = $dados_usuario['nome'];
		$_SESSION["logged_in"]= true;
		// Redirecionar para a página inicial
		header('Location: ../index.php');
        
		exit;
	} else {
		// As informações de login estão incorretas, exibir uma mensagem de erro
		echo 'Email ou senha incorretos.';
	}
}
?>

