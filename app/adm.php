<?php
include('_head.php');
include('autenticator.php');
include('autenticador_adm.php');
?>
<title>Dashboard - ADM</title>
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
                <a class="nav-item nav-link text-white" href="dashboard.php">Início</span></a>
                <a class="nav-item nav-link text-light" href="cadastrar.php">Pagina do Aluno</a>
                <a class="nav-item nav-link text-light active" href="adm.php">Pagina do Administrador <span class="sr-only">(current)</a>
                <a class="nav-item nav-link text-light" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-5">
        <div class="container-fluid bg-white border-20 p-3">
            <p class="h1">PAGINA DO ADM</p>
        </div>
    </div>
</body>