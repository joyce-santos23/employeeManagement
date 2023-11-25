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

    <!-- Bootstrap 5.2.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Controle de Funcionários</title>
</head>

<body>
    <?php require_once 'header.php'; ?>

    <main>
        <form class="department" action="/employeeManagement" method="get">
            <label for="department">Departamentos:</label>

            <?php
            $depart = null;

            if (isset($_GET['departamento'])) {
                $depart = $_GET['departamento'];
            }

            $query = "SELECT * FROM `Department`";
            $result = mysqli_query($conn, $query);
            ?>

            <select id="department" onchange="this.form.submit()" name="departamento">
                <option id="selecione">Selecione um Departamento</option>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = ($row['Id'] == $depart) ? 'selected' : '';
                    echo "<option value='{$row['Id']}' $selected>{$row['DepartmentName']}</option>";
                }
                ?>
            </select>

        </form>

        <h2>Funcionários</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $result = null;

            if ($depart && $depart !== "Selecione um Departamento") {
                $query = "SELECT * FROM `Employee` WHERE `DepartmentId` = $depart";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT * FROM `Employee`";
                $result = mysqli_query($conn, $query);
            }

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['EmployeeName'] ?></h5>
                                <p class="card-text"><b>Cargo:</b> <?php echo $row['Position'] ?></p>
                                <p class="card-text"><b>Email:</b> <?php echo $row['Email'] ?></p>
                                <a href="/employeeManagement/editarFuncionario.php?CPF=<?php echo $row['CPF']; ?>" class="btn btn-secondary employee_editar">Editar</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>