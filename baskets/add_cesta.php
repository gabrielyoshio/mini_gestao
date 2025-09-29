<?php
include '../config.php';

if(isset($_POST['produtos']) && is_array($_POST['produtos'])){
    foreach($_POST['produtos'] as $produto_id){
        // Verifica se já existe na cesta
        $check = $conn->prepare("SELECT * FROM cestas_itens WHERE produto_id=?");
        $check->bind_param("i",$produto_id);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows == 0){
            $stmt = $conn->prepare("INSERT INTO cestas_itens (produto_id) VALUES (?)");
            $stmt->bind_param("i",$produto_id);
            $stmt->execute();
        }
    }
    echo "success";
} else {
    echo "error";
}
