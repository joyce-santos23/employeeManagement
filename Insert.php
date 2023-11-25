<?php

require_once 'Connection.php';


if (isset($_POST['criar-login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $hash = password_hash($pwd, PASSWORD_ARGON2I);

    $sqlInsert = "INSERT INTO `login`(`login`, `senha`) VALUES ('$email','$hash')";

    $result = mysqli_query($conn, $sqlInsert);

    header('Location: login.php');
}


if (isset($_POST['employee'])) {
    $CPF = $_POST['CPF'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $DepartmentId = $_POST['DepartmentId'];
    $Email = $_POST['Email'];
    $EmployeeName = $_POST['EmployeeName'];
    $Position = $_POST['Position'];

    $data_formatada = DateTime::createFromFormat('d/m/Y', $DateOfBirth);
    $data_mysql = $data_formatada->format('Y-m-d');
    
    $sqlInsert = "INSERT INTO `employee`(`CPF`, `DateOfBirth`, `DepartmentId`, `Email`, `EmployeeName`, `Position`) VALUES ('$CPF','$data_mysql','$DepartmentId','$Email','$EmployeeName', '$Position')";
    $result = mysqli_query($conn, $sqlInsert);
}


if (isset($_POST['department'])) {
    $Name = $_POST['nome'];
    
    $sqlInsert = "INSERT INTO `department`(`Id`, `DepartmentName`) VALUES (null,'$Name')";
    $result = mysqli_query($conn, $sqlInsert);
}


if(isset($_POST['update'])){
    $CPF = $_POST['CPF'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $DepartmentId = $_POST['DepartmentId'];
    $Email = $_POST['Email'];
    $EmployeeName = $_POST['EmployeeName'];
    $Position = $_POST['Position'];

    $data_formatada = DateTime::createFromFormat('d/m/Y', $DateOfBirth);
    $data_mysql = $data_formatada->format('Y-m-d');

    $sqlUpdate = "UPDATE `employee` SET 
        `DateOfBirth`='$data_mysql',
        `DepartmentId`='$DepartmentId',
        `Email`='$Email',
        `EmployeeName`='$EmployeeName',
        `Position`='$Position'
    WHERE `CPF`='$CPF'";
    
    $result = mysqli_query($conn, $sqlUpdate);
}


if(isset($_POST['delete'])){
    $CPF = $_POST['CPF'];

    $sqlDelete = "DELETE FROM `employee` WHERE `CPF` = '$CPF'";
    $result = mysqli_query($conn, $sqlDelete);
}

header('Location: index.php');

?>