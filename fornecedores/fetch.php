<?php
include '../config.php';

$result = $conn->query("SELECT * FROM fornecedores ORDER BY id DESC");

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['telefone']}</td>";
        echo "<td>
                <button class='btn btn-sm btn-primary editBtn' data-id='{$row['id']}'>Editar</button>
                <button class='btn btn-sm btn-danger deleteBtn' data-id='{$row['id']}'>Excluir</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>Nenhum fornecedor encontrado</td></tr>";
}
