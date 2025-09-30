<?php
include '../config.php';
include '../navbar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Fornecedores</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div class="container mt-5">

<h2>Cadastro de Fornecedores</h2>

<form id="formFornecedor" class="row g-3 mb-4">
    <div class="col-md-4">
        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
    </div>
    <div class="col-md-4">
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="col-md-4">
        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
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
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="fornecedores-list"></tbody>
</table>

</div>

<script>
function fetchFornecedores(){
    $.ajax({
        url: 'fetch.php',
        method: 'GET',
        success: function(data){
            $('#fornecedores-list').html(data);
        }
    });
}

$(document).ready(function(){
    fetchFornecedores();

<<<<<<< HEAD
    // Função para criar fornecedor
=======
>>>>>>> cf278d5 (atualizacao)
    $('#formFornecedor').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp){
                if(resp.trim() === 'success'){
                    $('#formFornecedor')[0].reset();
                    fetchFornecedores();
                } else {
                    alert('Erro ao adicionar fornecedor.');
                }
            }
        });
    });

<<<<<<< HEAD
    // Função para deletar fornecedor
=======
>>>>>>> cf278d5 (atualizacao)
    $(document).on('click', '.deleteBtn', function(){
        if(confirm('Deseja realmente excluir este fornecedor?')){
            let id = $(this).data('id');
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: {id:id},
                success: function(resp){
                    if(resp.trim() === 'success'){
                        fetchFornecedores();
                    } else {
                        alert('Erro ao excluir.');
                    }
                }
            });
        }
    });

<<<<<<< HEAD
    // Função para editar fornecedor
=======
>>>>>>> cf278d5 (atualizacao)
    $(document).on('click', '.editBtn', function(){
        let id = $(this).data('id');
        let nome = $(this).data('nome');
        let email = $(this).data('email');
        let telefone = $(this).data('telefone');

<<<<<<< HEAD
        // Preenche o formulário com os dados existentes
=======
>>>>>>> cf278d5 (atualizacao)
        $('#formFornecedor input[name="nome"]').val(nome);
        $('#formFornecedor input[name="email"]').val(email);
        $('#formFornecedor input[name="telefone"]').val(telefone);

<<<<<<< HEAD
        // Muda botão para atualizar
        $('#formFornecedor button[type="submit"]').text('Atualizar').removeClass('btn-success').addClass('btn-primary');

        // Altera ação do formulário para atualizar
=======
        $('#formFornecedor button[type="submit"]').text('Atualizar').removeClass('btn-success').addClass('btn-primary');

>>>>>>> cf278d5 (atualizacao)
        $('#formFornecedor').off('submit').on('submit', function(e){
            e.preventDefault();
            let novoNome = $('#formFornecedor input[name="nome"]').val();
            let novoEmail = $('#formFornecedor input[name="email"]').val();
            let novoTelefone = $('#formFornecedor input[name="telefone"]').val();

            $.ajax({
                url: 'update.php',
                method: 'POST',
                data: {id:id, nome:novoNome, email:novoEmail, telefone:novoTelefone},
                success: function(resp){
                    if(resp.trim() === 'success'){
                        $('#formFornecedor')[0].reset();
                        fetchFornecedores();
<<<<<<< HEAD
                        // Volta o botão para adicionar
                        $('#formFornecedor button[type="submit"]').text('Adicionar').removeClass('btn-primary').addClass('btn-success');

                        // Restaura função criar
=======
                        $('#formFornecedor button[type="submit"]').text('Adicionar').removeClass('btn-primary').addClass('btn-success');

>>>>>>> cf278d5 (atualizacao)
                        $('#formFornecedor').off('submit').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                url: 'create.php',
                                method: 'POST',
                                data: $(this).serialize(),
                                success: function(resp){
                                    if(resp.trim() === 'success'){
                                        $('#formFornecedor')[0].reset();
                                        fetchFornecedores();
                                    } else {
                                        alert('Erro ao adicionar fornecedor.');
                                    }
                                }
                            });
                        });
                    } else {
                        alert('Erro ao atualizar fornecedor.');
                    }
                }
            });
        });
    });
});
</script>

</body>
</html>
