<?php
include '../config.php';

if(isset($_POST['produtos']) && is_array($_POST['produtos'])){
    // Pegando o usuário logado (por enquanto fixo em 1, depois pode usar $_SESSION)
    $usuario_id = 1; 
    
    // Verifica se já existe uma cesta para o usuário
    $checkCesta = $conn->prepare("SELECT id FROM cestas WHERE usuario_id=?");
    $checkCesta->bind_param("i", $usuario_id);
    $checkCesta->execute();
    $resCesta = $checkCesta->get_result();
    
    if($resCesta->num_rows > 0){
        $cesta = $resCesta->fetch_assoc();
        $cesta_id = $cesta['id'];
    } else {
        // Se não existir, cria uma nova cesta
        $stmtCesta = $conn->prepare("INSERT INTO cestas (usuario_id) VALUES (?)");
        $stmtCesta->bind_param("i", $usuario_id);
        $stmtCesta->execute();
        $cesta_id = $stmtCesta->insert_id;
    }

    foreach($_POST['produtos'] as $produto_id){
        // Verifica se o produto já está na cesta
        $check = $conn->prepare("SELECT * FROM cestas_itens WHERE cesta_id=? AND produto_id=?");
        $check->bind_param("ii", $cesta_id, $produto_id);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows == 0){
            $stmt = $conn->prepare("INSERT INTO cestas_itens (cesta_id, produto_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $cesta_id, $produto_id);
            $stmt->execute();
        }
    }
    echo "success";
} else {
    echo "error";
}