<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'user45' && $password === 'pass09') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: home.php');
        exit();
    } else {
        echo '<script>alert("Utilizador ou senha inválido")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php if (isset($_SESSION['username'])): ?>
		<p style="color: blue; text-align: right;"><?php echo $_SESSION['username']; ?></p>
	<?php endif; ?>
</body>
</html>
