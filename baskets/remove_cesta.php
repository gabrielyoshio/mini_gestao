<?php
include '../config.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM cestas_itens WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
