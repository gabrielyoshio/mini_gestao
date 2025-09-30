<?php
include 'config.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "success";
}
