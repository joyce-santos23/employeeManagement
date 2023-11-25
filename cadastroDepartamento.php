<?php
    require_once 'Connection.php';

    if(!array_key_exists('logado', $_SESSION)) {
        header('Location: login.php');
        return;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
  
    <title>Cadastro de Departamento</title>
</head>
<body>
    <?php require_once 'header.php'; ?>

    <main>
        <div class="edit-box">
            <h2>Cadastrar um novo departamento</h2>

            <form action="insert.php" method="POST">
                
                <div class="user-box">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>

                <input id="submit" name="department" class="btn btn-primary" type="submit" value="Cadastrar" />

            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>