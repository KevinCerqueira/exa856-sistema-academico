<!--FRONT-END-->
<?php
include '_head.php';
include 'connection.php';
include 'autenticator.php';
?>

<title>Listagem de Alunos</title>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <a class="navbar-brand text-white" href="dashboard.php">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Sistema Acadêmico
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a id="nav-first" class="nav-item ml-3 nav-link text-light btn border-20" href="dashboard.php">Início <span class="sr-only">(current)</span></a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="cadastrar-aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item ml-3 nav-link text-light btn text-white active  btn-secondary border-20" href="listar-aluno.php">Listagem de Alunos</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="boss.php">Boss</a>
                <a class="nav-item ml-3 nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>

<div class="container">
<div class="m-1 p-3">
    <div class="form-group col-12 m-0 p-0">
        <h2>Listagem de Alunos</h2>
    </div>
    <div class="row mt-3 mx-0 p-1 border-top border-bottom border-shadow rounded" style="background-color:white">
        <div class="row col-12 col-md-11 my-1">
            <div class="row col-12">
                <div class="col-8 col-5 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Nome</div>
                    <div class="col-12 p-0">   <!--INSERIR NOME AQUI--> </div>
                </div>
                <div class= "col-5 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Curso</div>
                    <div class="col-12 p-0">  <!--INSERIR NOME AQUI-->  </div>
                </div>
                <div class= "col-6 col-md-3">
                    <div class="col-12 p-0 my-1 font-weight-bold">Instituição</div>
                    <div class="col-12 p-0">   <!--INSERIR NOME AQUI--> </div>
                </div>
                <div class= "col-5 col-md-3">
                    <div class="col-12 p-0 my-1 my-md-0 font-weight-bold">Endereço</div>
                    <div class="col-12 p-0">    <!--INSERIR NOME AQUI--></div>
                </div>
            </div>
        </div>
    </div>    
</div>
<div>
</body>

