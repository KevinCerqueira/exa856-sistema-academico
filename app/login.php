<?php
session_start();
include('connection.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($dataBase, $_POST['usuario']);
$senha = mysqli_real_escape_string($dataBase, $_POST['senha']);

$sql = "SELECT * FROM adm WHERE usuario = '$usuario' AND senha = md5('$senha')";
$resultado = $dataBase->query($sql);

$row = $resultado->num_rows;

if($row == 1){
    $user = $resultado->fetch_assoc();
    $_SESSION['ID'] = $user['ID'];
    $_SESSION['NAME'] = $user['usuario'];
    $_SESSION['PERMISS'] = $user['permissao'];
    header('Location: dashboard.php');
    exit();
} else{
    $_SESSION['invalid'] = true;
    header('Location: index.php');
    exit();
}