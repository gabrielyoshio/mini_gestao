<?php
include '../config.php';

$res = $conn->query("SELECT * FROM produtos ORDER BY nome ASC");

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        echo "<tr>
                <td><input type='checkbox' class='produtoCheckbox' data-id='{$row['id']}'></td>
                <td>{$row['nome']}</td>
                <td>R$ {$row['preco']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nenhum produto disponível</td></tr>";
}
