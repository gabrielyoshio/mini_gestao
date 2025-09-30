<?php
include '../config.php';
include '../navbar.php';

$erro = '';
$sucesso = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']);

<<<<<<< HEAD
    // Verifica se já existe usuário
=======
>>>>>>> cf278d5 (atualizacao)
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $erro = "Email já cadastrado!";
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)");
        $stmt->bind_param("sss",$nome,$email,$senha);
        if($stmt->execute()){
            $sucesso = "Cadastro realizado com sucesso! Agora faça login.";
        } else {
            $erro = "Erro ao cadastrar usuário!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Registrar Usuário</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<h2>Cadastro de Usuário</h2>

<?php if($erro): ?>
<div class="alert alert-danger"><?= $erro ?></div>
<?php endif; ?>
<?php if($sucesso): ?>
<div class="alert alert-success"><?= $sucesso ?></div>
<?php endif; ?>

<form method="post" class="row g-3">
    <div class="col-md-4">
        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
    </div>
    <div class="col-md-4">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="col-md-4">
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
    </div>
</form>
<p class="mt-3">Já tem conta? <a href="login.php">Login</a></p>

</div>
</body>
</html>
