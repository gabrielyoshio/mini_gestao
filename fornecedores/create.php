<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $conn->prepare("INSERT INTO fornecedores (nome,email,telefone) VALUES (?,?,?)");
    $stmt->bind_param("sss",$nome,$email,$telefone);

    if($stmt->execute()){
        echo "success";
    } else {
        echo "error";
    }
}
