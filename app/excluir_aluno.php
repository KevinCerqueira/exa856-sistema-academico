<?php
include('_head.php');
include('autenticator.php');
include('connection.php');
include_once('model.php');

$user=json_decode($_POST['user']);

Model::deleteById('aluno', ['usuario_ID'=>$user->ID], true);
Model::deleteById('usuario', ['ID'=>$user->ID], true);
Model::deleteById('endereco', ['ID'=>$user->end_ID], true);

header('Location: adm.php');
exit();