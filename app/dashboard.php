<?php
include('_head.php');
include('autenticator.php');
?>
<title>Dashboard</title>
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
                <a id="nav-first" class="nav-item ml-3 nav-link text-white active btn btn-secondary border-20" href="dashboard.php">Início <span class="sr-only">(current)</span></a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="cadastrar-aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="listar-aluno.php">Listagem de Alunos</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="boss.php">Boss</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="faq.php">Perguntas Frequentes</a>
                <a class="nav-item ml-3 nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="corpo container-fluid p-5">
        <div class="container-fluid bg-white border-20 p-3">
            <?php
                if($_SESSION['NAME'] == "profClaudio"):
            ?>
                <p class="h1">Olá, <strong>Professor Cláudio!</strong></p>
            <?php
                elseif($_SESSION['NAME'] == "grupoElevador"):
            ?>
                <p class="h1">Olá, <strong>grupo Avaliador!</strong></p>
            <?php
                elseif($_SESSION['NAME'] == "exa856"):
            ?>
                <p class="h1">Olá, <strong>Criador desta página!</strong></p>
            <?php
                else:
            ?>
                <p class="h1">Olá, <strong><?php $_SESSION['NAME']?></strong></p>
            <?php
                endif;
            ?>
            <div class="container-fluid p-2">
                <p class="h5">Este é o <strong>Dashboard do Sistema.</strong></p>
                <p class="">Somente nós (grupo do Sistema Acadêmico), o grupo avaliador e o prof. Cláudio pode ter acesso.</p>
                <p class="h6">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    Aqui você vai encontrar: </p>
                <p class="h6 ml-3"> <i class="fa fa-circle" aria-hidden="true" style="font-size: 11px;"></i>
                    <a href="faq.php">Perguntas Frequentes:</a> é onde encontra-se dúvidas comuns e suas devidas respostas.
                </p>
                <p class="h6 ml-3"><i class="fa fa-circle" aria-hidden="true" style="font-size: 11px;"></i>
                    <a href="cadastrar.php">Página do Aluno</a>: é onde o Aluno irá se cadastrar, ou seja, é o trabalho em si requerido pelo professor: 
                    uma tela de cadastro para o aluno se cadastrar.</p>
                <p class="h6 ml-3"><i class="fa fa-circle" aria-hidden="true" style="font-size: 11px;"></i>
                    <a href="adm.php">Página do Administrador</a>: onde o adiministrador (o professor Cláudio) poderá fazer as alterações no banco (exluir, adicionar e editar os registros do aluno).</p>
                <label class="text-danger mt-2">OBS: somente o prof. Cláudio tem acesso a página do Administrador.</label>
            </div>
        </div>
    </div>
</body>
