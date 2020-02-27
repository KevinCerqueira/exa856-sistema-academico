<?php
include('autenticator.php');
include('autenticador_level0.php');
include('connection.php');

if(empty($_POST['ID'])){
    header('Location: boss.php');
    exit();
}
$usuario_ID = intval($dataBase->real_escape_string($_POST['ID']));
$resultado = $dataBase->query("DELETE FROM adm WHERE ID = $usuario_ID");
if($resultado){
    $_SESSION['admExcluirSucesso'] = true;
    header('Location: boss.php');
    exit();
}
else{
    $_SESSION['admExcluirErro'] = true;
    header('Location: boss.php');
    exit();
}