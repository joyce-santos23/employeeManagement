<?php
    if(!isset($_SESSION)) { //inicia uma sessão
        session_start();
    }

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "employeemanagement";
    $conn = mysqli_connect($servidor, $usuario, $senha, $bd);
?>