<?php
include 'config.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Produtos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div class="container mt-5">

<h2>Cadastro de Produtos</h2>

<form id="formProduto" class="row g-3 mb-4">
    <div class="col-md-6">
        <input type="text" name="nome" class="form-control" placeholder="Nome do produto" required>
    </div>
    <div class="col-md-6">
        <input type="number" name="preco" class="form-control" placeholder="Preço" step="0.01" required>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success w-100">Adicionar</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="produtos-list"></tbody>
</table>

</div>

<script>
function fetchProdutos(){
    $.ajax({
        url: 'fetch.php',
        method: 'GET',
        success: function(data){
            $('#produtos-list').html(data);
        }
    });
}

$(document).ready(function(){
    fetchProdutos();

    $('#formProduto').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp){
                if(resp.trim() === 'success'){
                    $('#formProduto')[0].reset();
                    fetchProdutos();
                } else {
                    alert('Erro ao adicionar produto.');
                }
            }
        });
    });

    $(document).on('click', '.deleteBtn', function(){
        if(confirm('Deseja realmente excluir este produto?')){
            let id = $(this).data('id');
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: {id:id},
                success: function(resp){
                    if(resp.trim() === 'success'){
                        fetchProdutos();
                    } else {
                        alert('Erro ao excluir.');
                    }
                }
            });
        }
    });
});
</script>

</body>
</html>
