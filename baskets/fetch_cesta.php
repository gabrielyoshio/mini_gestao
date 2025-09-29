<?php
include '../config.php';

// Seleciona todos os itens da cesta
$res = $conn->query("
    SELECT ci.id AS cesta_id, p.nome, p.preco 
    FROM cestas_itens ci
    JOIN produtos p ON ci.produto_id = p.id
    ORDER BY ci.id DESC
");

$total = 0;
$quantidade = 0;

if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
        echo "<tr>
                <td>{$row['nome']}</td>
                <td>R$ {$row['preco']}</td>
                <td>
                    <button class='btn btn-danger btn-sm removeBtn' data-id='{$row['cesta_id']}'>
                        Remover
                    </button>
                </td>
              </tr>";
        $total += $row['preco'];
        $quantidade++;
    }
    echo "<tr>
            <td><strong>Total ({$quantidade} produtos)</strong></td>
            <td><strong>R$ {$total}</strong></td>
            <td></td>
          </tr>";
} else {
    echo "<tr><td colspan='3'>Cesta vazia</td></tr>";
}
