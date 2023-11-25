<?php
    require_once 'Connection.php';
    
    if(!array_key_exists('logado', $_SESSION)) {
        header('Location: login.php');
        return;
    }
    
    if (isset($_GET['CPF'])) {
        $CPF = $_GET['CPF'];

        $query = "SELECT * FROM `Employee` WHERE `CPF` = '$CPF'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $row['DateOfBirth'] = formatarDataBrasil($row['DateOfBirth']);
        } else {
            exit();
        }
    } else {
        exit();
    }

    function formatarDataBrasil($data) {
        return date('d/m/Y', strtotime($data));
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

  <title>Edição de Funcionário</title>
</head>
<body>
    <?php require_once 'header.php'; ?>

    <main>

        <div class="edit-box">
            <h2>Editar Informações do Funcionário</h2>
 
            <form action="insert.php" method="POST" onsubmit="return validarForm()">
                <input type="hidden" name="CPF" value="<?php echo $row['CPF']; ?>">

                <div class="user-box">
                    <label for="nome">Nome</label>
                    <input type="text" value="<?php echo $row['EmployeeName']; ?>" name="EmployeeName" id="nome" required>
                </div>

                <div class="user-box">
                    <label for="cpf">CPF</label>
                    <input disabled type="text" value="<?php echo $row['CPF']; ?>" name="CPF" id="cpf" oninput="formatarCPF(this)" onblur="validarCPF(this.value)">
                    <span id="cpfError" style="color: red;"></span>
                </div>

                <div class="user-box">
                    <label for="nascimento">Data de Nascimento (DD/MM/AAAA)</label>
                    <input type="text" value="<?php echo $row['DateOfBirth']; ?>" name="DateOfBirth" id="nascimento" onblur="validarDataNascimento(this.value)">
                    <span id="dataNascimentoError" style="color: red;"></span>
                </div>

                <div class="user-box">
                    <label for="email">Email</label>
                    <input type="text" value="<?php echo $row['Email']; ?>" name="Email" id="email" onblur="validarEmail(this.value)">
                    <span id="emailError" style="color: red;"></span>
                </div>

                <div class="user-box">
                    <label for="position">Cargo</label>
                    <input type="text" value="<?php echo $row['Position']; ?>" name="Position" id="position" required>
                </div>

                <div class="user-box">
                    <label for="department">Departamento</label>
                    <select id="department" name="DepartmentId" required>
                        <option value="" disabled selected>Selecione um Departamento</option>
                        <?php
                        $queryDepartments = "SELECT * FROM `Department`";
                        $resultDepartments = mysqli_query($conn, $queryDepartments);

                        if ($resultDepartments) {
                            while ($department = mysqli_fetch_assoc($resultDepartments)) {
                                $selected = ($department['Id'] == $row['DepartmentId']) ? 'selected' : '';
                                echo "<option value='{$department['Id']}' $selected>{$department['DepartmentName']}</option>";
                            }
                        } else {
                            echo "<option value=''>Erro ao carregar departamentos: " . mysqli_error($conn) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <input id="submit" name="update" class="btn btn-primary" type="submit" value="Atualizar" />
                <input id="excluir" name="delete" class="btn btn-danger" type="submit" value="Excluir" />
            </form>
        </div>
        
    </main>

    <script src="js/javaScript.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>