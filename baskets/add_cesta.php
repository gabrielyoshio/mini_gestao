<?php
include '../config.php';

if (isset($_POST['produtos']) && is_array($_POST['produtos'])) {
    $usuario_id = 1;
    $stmt = $conn->prepare("INSERT INTO cestas (usuario_id, criado_em) VALUES (?, NOW())");
    $stmt->bind_param("i", $usuario_id);
    if (!$stmt->execute()) {
        echo "error: não conseguiu criar a cesta - " . $stmt->error;
        exit;
    }
    $cesta_id = $conn->insert_id;

    $stmt_item = $conn->prepare("INSERT INTO cestas_itens (cesta_id, produto_id) VALUES (?, ?)");
    if (!$stmt_item) {
        echo "error: prepare itens - " . $conn->error;
        exit;
    }

    foreach ($_POST['produtos'] as $produto_id) {
        $produto_id = intval($produto_id);
        $stmt_item->bind_param("ii", $cesta_id, $produto_id);
        if (!$stmt_item->execute()) {
            echo "error: item falhou - " . $stmt_item->error;
            exit;
        }
    }

    echo "success";
} else {
    echo "error: nenhum produto selecionado";
}
