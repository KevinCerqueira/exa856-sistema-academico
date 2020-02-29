<?php 

include('_head.php');
include('autenticator.php');
include('connection.php');
include_once('model.php');

if(empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['cpf']) || empty($_POST['rg']) || empty($_POST['nascimento']) || empty($_POST['mae']) || empty($_POST['pai']) || empty($_POST['telefone']) || empty($_POST['logradouro']) || empty($_POST['bairro']) || empty($_POST['cidade']) || empty($_POST['cep']) || empty($_POST['email']) || empty($_POST['senha']) || (empty($_POST['numero']) && empty($_POST['sn'])) ){
    header('Location: adm.php');
    exit();
}
$usuario_ID= $dataBase->real_escape_string($_POST['usuario_ID']);
$nome = $dataBase->real_escape_string($_POST['nome']);
$sobrenome = $dataBase->real_escape_string($_POST['sobrenome']);
$cpf = $dataBase->real_escape_string($_POST['cpf']);
$rg = $dataBase->real_escape_string($_POST['rg']);
$telefone = $dataBase->real_escape_string($_POST['telefone']);
$nascimento = $dataBase->real_escape_string($_POST['nascimento']);
$mae = $dataBase->real_escape_string($_POST['mae']);
$pai = $dataBase->real_escape_string($_POST['pai']);
$endereco_ID = $dataBase->real_escape_string($_POST['endereco_ID']);
$logradouro = $dataBase->real_escape_string($_POST['logradouro']);
$bairro = $dataBase->real_escape_string($_POST['bairro']);
$cidade = $dataBase->real_escape_string($_POST['cidade']);
$estado = $dataBase->real_escape_string($_POST['estado']);
$cep = $dataBase->real_escape_string($_POST['cep']);
$instituicao = $dataBase->real_escape_string($_POST['instituicao']);
$curso = $dataBase->real_escape_string($_POST['curso']);
$email = $dataBase->real_escape_string($_POST['email']);
$senha = $dataBase->real_escape_string($_POST['senha']);


if(empty($_POST['numero'])){
    $numero = "S/N";
}else{
    $numero = $dataBase->real_escape_string($_POST['numero']);
}

Model::update('endereco', ['cep'=>$cep, 'logradouro'=> $logradouro, 'bairro'=>$bairro, 'numero'=>$numero, 'cidade'=>$cidade, 'estado'=>$estado], ['ID'=>$endereco_ID], true);

Model::update('usuario', ['nome'=>$nome, 'sobrenome'=> $sobrenome, 'email'=> $email,'senha'=> $senha,'cpf'=> $cpf,'rg'=>$rg,'telefone'=>$telefone,
], ['ID'=>$usuario_ID], true);

$curso_ID = intval($curso);
Model::update('aluno',['data_nascimento'=>$nascimento, 'nome_pai'=>$pai,'nome_mae'=>$mae, 'curso_ID'=>$curso_ID], ['usuario_ID'=>$usuario_ID],true);

header('Location: adm.php');
exit();






