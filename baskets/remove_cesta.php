<?php
include '../config.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM cestas_itens WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
