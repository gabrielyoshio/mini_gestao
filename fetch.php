<?php
include 'config.php';

$res = $conn->query("SELECT * FROM produtos ORDER BY id DESC");

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['preco']}</td>
                <td>
                    <button class='btn btn-sm btn-danger deleteBtn' data-id='{$row['id']}'>Excluir</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum produto encontrado</td></tr>";
}
