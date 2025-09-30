<?php
include '../config.php';
session_start();
$erro = '';
$sucesso = '';

if(isset($_POST['email'], $_POST['senha'])){
    $email = $_POST['email'];
<<<<<<< HEAD
    $senha = hash('sha256', $_POST['senha']); // SHA-256
=======
    $senha = hash('sha256', $_POST['senha']); 

>>>>>>> cf278d5 (atualizacao)

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows === 1){
        $_SESSION['usuario'] = $email;
        header("Location: ../baskets/index.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
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
    <h2>Login</h2>

    <?php if($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
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

        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>

    <div class="mt-3 text-center">
        <a href="register.php">Criar uma conta</a>
    </div>
</div>

</body>
</html>
