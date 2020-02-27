<?php
include('autenticator.php');
include('autenticador_level0.php');
include('connection.php');

$sql = "SELECT * FROM adm";
$resultado = $dataBase->query($sql);
$adms = $resultado->fetch_all();