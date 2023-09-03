
<?php

$host = "localhost";
$dbname = "teste2";
$user = "root";
$password = "Melany3915";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem sucedida";
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}

?>