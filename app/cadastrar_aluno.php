<?php
include('_head.php');
include('autenticator.php');
include('connection.php');


if(empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['cpf']) || empty($_POST['rg']) || empty($_POST['nascimento']) || empty($_POST['mae']) || empty($_POST['pai']) || empty($_POST['telefone']) || empty($_POST['logradouro']) || empty($_POST['bairro']) || empty($_POST['cidade']) || empty($_POST['cep']) || empty($_POST['email']) || empty($_POST['senha']) || (empty($_POST['numero']) && empty($_POST['sn'])) ){
    header('Location: cadastrar-aluno.php');
    exit();
}
$nome = $dataBase->real_escape_string($_POST['nome']);
$sobrenome = $dataBase->real_escape_string($_POST['sobrenome']);
$cpf = $dataBase->real_escape_string($_POST['cpf']);
$rg = $dataBase->real_escape_string($_POST['rg']);
$telefone = $dataBase->real_escape_string($_POST['telefone']);
$nascimento = $dataBase->real_escape_string($_POST['nascimento']);
$mae = $dataBase->real_escape_string($_POST['mae']);
$pai = $dataBase->real_escape_string($_POST['pai']);
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


$resultCpf = $dataBase->query("SELECT ID from usuario WHERE CPF = '$cpf'");
if($resultCpf->num_rows > 0){
    $_SESSION['cpfExistente'] = true;
    header('Location: cadastrar-aluno.php');
    exit;
}
$resultRg = $dataBase->query("SELECT ID from usuario WHERE RG = '$rg'");
if($resultRg->num_rows > 0){
    $_SESSION['rgExistente'] = true;
    header('Location: cadastrar-aluno.php');
    exit;
}

$sql = "INSERT INTO endereco (cep, logradouro, numero, bairro, cidade, estado) VALUES (
    '$cep',
    '$logradouro',
    '$numero',
    '$bairro',
    '$cidade',
    '$estado'
)";
$resultEndereco = $dataBase->query($sql);
$endereco_ID = $dataBase->insert_id;
// echo "Endereço: ".$resultEndereco;

$sql = "INSERT INTO usuario (nome, sobrenome, email, senha, CPF, RG, telefone, endereco_ID) VALUES (
    '$nome',
    '$sobrenome',
    '$email',
    '$senha',
    '$cpf',
    '$rg',
    '$telefone',
    $endereco_ID
)";
$resultUsuario = $dataBase->query($sql);
// echo " Usuario: ".$resultUsuario;
$usuario_ID = $dataBase->insert_id;

$curso_ID = intval($curso);

$sql = "INSERT INTO aluno (usuario_ID, data_nascimento, nome_pai, nome_mae, curso_ID) VALUES (
    $usuario_ID,
    '$nascimento',
    '$pai',
    '$mae',
    $curso_ID
)";
$resultAluno = $dataBase->query($sql);
// echo " Aluno: ".$resultAluno;
if(!$resultEndereco){
    $_SESSION['erroEndereco'] = true;
    header('Location: cadastrar-aluno.php');
    exit();
} else if(!$resultUsuario){
    $_SESSION['erroUsuario'] = true;
    header('Location: cadastrar-aluno.php');
    exit();
} else if(!$resultAluno){
    $_SESSION['erroAluno'] = true;
    header('Location: cadastrar-aluno.php');
    exit();
} else{
    $_SESSION['cadSucesso'] = true;
    header('Location: sucesso.php');
    exit();
}
