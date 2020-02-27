<?php
include('autenticator.php');
include('autenticador_level0.php');
include('connection.php');
if(empty($_POST['nome']) || empty($_POST['senha'])){
    header('Location: boss.php');
    exit();
}
$usuario = $dataBase->real_escape_string($_POST['nome']);
$senha = $dataBase->real_escape_string($_POST['senha']);
$permissao = intval($dataBase->real_escape_string($_POST['permissao']));

$resultado = $dataBase->query("INSERT INTO adm (usuario, senha, permissao) VALUES (
    '$usuario',
    md5('$senha'),
    $permissao
)");
if($resultado){
    $_SESSION['admCadSucesso'] = true;
    header('Location: boss.php');
    exit();
}
else{
    $_SESSION['admCadErro'] = true;
    header('Location: boss.php');
    exit();
}
