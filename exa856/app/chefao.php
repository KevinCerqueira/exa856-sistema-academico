<?php
include('_head.php');
include('autenticator.php');
include('autenticador_level1.php');
include('connection.php');

$sql = "SELECT * FROM adm";
$resultado = $dataBase->query($sql);
$adms = $resultado->fetch_all();
$_SESSION['adms'] = $adms;
header('Location: chefao_page.php');
exit();