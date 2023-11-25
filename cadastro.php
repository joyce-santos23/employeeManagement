<?php
	require_once 'Connection.php';
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
        <form action="insert.php" method="POST" class="formLogin" onsubmit="return validarForm()">
            <h1>Cadastro</h1>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" onblur="validarEmail(this.value)" placeholder="Digite seu e-mail" />
            
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Digite seu e-mail" />

            <input type="submit" value="Criar" name="criar-login" class="btn" />
        </form>
    </div>

    <script src="js/javaScript.js" ></script>
</body>
</html>