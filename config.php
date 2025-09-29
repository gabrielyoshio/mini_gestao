<?php
$servername = "localhost";
$username = "root"; // seu usuário do MySQL
$password = "";     // sua senha do MySQL
$dbname = "mini_gestao_produtos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
