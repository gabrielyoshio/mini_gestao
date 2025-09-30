<?php
$servername = "localhost";
$username   = "root"; // usuário padrão do MySQL no XAMPP
$password   = "";     // senha padrão é vazia no XAMPP
$dbname     = "mini_gestao_produtos"; // ajuste se seu banco tiver outro nome

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
