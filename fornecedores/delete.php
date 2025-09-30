<?php
include '../config.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM fornecedores WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    echo "success";
}
