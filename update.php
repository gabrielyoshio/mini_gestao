<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("UPDATE produtos SET nome=?, preco=? WHERE id=?");
    $stmt->bind_param("sdi", $nome, $preco, $id);

    if($stmt->execute()){
        echo "success";
    } else {
        echo "error";
    }
}
