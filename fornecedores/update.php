<?php
include '../config.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $conn->prepare("UPDATE fornecedores SET nome=?, email=?, telefone=? WHERE id=?");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);

    if($stmt->execute()){
        echo "success";
    } else {
        echo "error";
    }
}
