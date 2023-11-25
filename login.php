<?php
session_start();
require_once 'Connection.php';
if (isset($_POST['acessar-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `login` WHERE `login`='$email'";
    $result = mysqli_query($conn, $query);
    $userData = mysqli_fetch_assoc($result);

    $correctPassword = password_verify($password, $userData['senha'] ?? '');
    if ($correctPassword) {
        $_SESSION['logado'] = true;
        header("Location: index.php");
    } else {
        header("Location: login.php?success=0");
    }
}

if (isset($_GET['sair'])) {
    $_SESSION['logado'] = false;
    session_destroy();
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="page">
        <form action="login.php" method="POST" class="formLogin" onsubmit="return validarForm()">
            <h1>Login</h1>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" onblur="validarEmail(this.value)" placeholder="Digite seu e-mail" />
            
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Digite seu e-mail" />

            <a href="cadastro.php">Não possui uma conta?</a>

            <input type="submit" value="Acessar" name="acessar-login" class="btn" />
        </form>
    </div>

    <script src="js/javaScript.js" ></script>
</body>
</html>