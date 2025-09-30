<?php
include '../config.php';
include '../navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cesta de Compras</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div class="container mt-5">

<h2>Produtos Disponíveis</h2>

<form id="formCesta">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Selecionar</th>
                <th>Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id="produtos-list"></tbody>
    </table>
    <button type="submit" class="btn btn-success">Adicionar à Cesta</button>
</form>

<h2 class="mt-5">Minha Cesta</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="cesta-list"></tbody>
</table>

</div>

<script>
function fetchProdutos(){
    $.ajax({
        url: 'fetch_produtos.php',
        method: 'GET',
        success: function(data){
            $('#produtos-list').html(data);
        }
    });
}

function fetchCesta(){
    $.ajax({
        url: 'fetch_cesta.php',
        method: 'GET',
        success: function(data){
            $('#cesta-list').html(data);
        }
    });
}

$(document).ready(function(){
    fetchProdutos();
    fetchCesta();

<<<<<<< HEAD
    // Adicionar produtos à cesta
=======
>>>>>>> cf278d5 (atualizacao)
    $('#formCesta').on('submit', function(e){
        e.preventDefault();

        let produtos = [];
        $('.produtoCheckbox:checked').each(function(){
            produtos.push($(this).data('id'));
        });

        if(produtos.length === 0){
            alert('Selecione pelo menos um produto!');
            return;
        }

        $.ajax({
            url: 'add_cesta.php',
            method: 'POST',
            data: {produtos: produtos},
            success: function(resp){
                if(resp.trim() === 'success'){
                    fetchCesta();
                    $('.produtoCheckbox').prop('checked', false);
                    alert('Produtos adicionados à cesta!');
                } else {
                    alert('Erro ao adicionar à cesta.');
                }
            }
        });
    });

<<<<<<< HEAD
    // Remover produto da cesta
=======
>>>>>>> cf278d5 (atualizacao)
    $(document).on('click', '.removeBtn', function(){
        let id = $(this).data('id');
        if(confirm('Deseja realmente remover este produto da cesta?')){
            $.ajax({
                url: 'remove_cesta.php',
                method: 'POST',
                data: {id: id},
                success: function(resp){
                    if(resp.trim() === 'success'){
                        fetchCesta();
                        alert('Produto removido!');
                    } else {
                        alert('Erro ao remover produto.');
                    }
                }
            });
        }
    });
});
</script>

</body>
</html>
