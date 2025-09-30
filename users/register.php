<?php
include '../config.php';
session_start();
$erro = '';
$sucesso = '';

if(isset($_POST['email'], $_POST['senha'])){
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']); 


    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $erro = "Este e-mail já está cadastrado!";
    } else {
       
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senha);

        if($stmt->execute()){
            $sucesso = "Conta criada com sucesso! Agora você pode fazer login.";
        } else {
            $erro = "Erro ao criar conta. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Registrar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.card {
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    background-color: #fff;
}
h2 {
    text-align: center;
    margin-bottom: 1.5rem;
}
</style>
</head>
<body>

<div class="card">
    <h2>Criar Conta</h2>

    <?php if($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <?php if($sucesso): ?>
        <div class="alert alert-success"><?= $sucesso ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Registrar</button>
    </form>

    <div class="mt-3 text-center">
        <a href="login.php">Já tem uma conta? Faça login</a>
    </div>
</div>

</body>
</html>
