<?php
$servername = "localhost";
<<<<<<< HEAD
$username = "root"; // seu usuário do MySQL
$password = "";     // sua senha do MySQL
$dbname = "mini_gestao_produtos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
=======
$username = "root";       

$password = "";           

$dbname   = "mini_gestao_produtos"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
>>>>>>> cf278d5 (atualizacao)
?>
