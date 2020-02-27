<?php
include('autenticator.php');
include('autenticador_level0.php');
include('connection.php');
if((empty(($_POST["nome"])) && empty($_POST["senha"])) || empty($_POST["permissao"]) || empty($_POST["ID"])){
    header('Location: boss.php');
    exit();
}

$usuario_ID = intval($dataBase->real_escape_string($_POST['ID']));
$nome = $dataBase->real_escape_string($_POST['nome']);
$senha = $dataBase->real_escape_string($_POST['senha']);
$permissao = intval($dataBase->real_escape_string($_POST['permissao']));
if($senha == ""){
    $resultado = $dataBase->query("UPDATE adm SET usuario = '$nome', permissao = $permissao WHERE ID = $usuario_ID");
    if($resultado){
        $_SESSION['admEditarSucesso'] = true;
        header('Location: boss.php');
        exit();
    }
    else{
        $_SESSION['admEditarErro'] = true;
        header('Location: boss.php');
        exit();
    } 
}
$resultado = $dataBase->query("UPDATE adm SET usuario = '$nome', senha = md5('$senha'), permissao = $permissao WHERE ID = $usuario_ID");
if($resultado){
    $_SESSION['admEditarSucesso'] = true;
    header('Location: boss.php');
    exit();
}
else{
    $_SESSION['admEditarErro'] = true;
    header('Location: boss.php');
    exit();
}