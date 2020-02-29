<?php
include('_head.php');
include('autenticator.php');
?>
<title>Perguntas Frequentes - FAQ</title>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <a class="navbar-brand text-white" href="dashboard.php">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Sistema Acadêmico
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a id="nav-first" class="nav-item ml-3 nav-link text-light btn border-20" href="dashboard.php">Início <span class="sr-only">(current)</span></a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="cadastrar-aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="listar_aluno.php">Listagem de Alunos</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="boss.php">Boss</a>
                <a class="nav-item ml-3 nav-link text-white active btn btn-secondary border-20" href="faq.php">Perguntas Frequentes</a>
                <a class="nav-item ml-3 nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="corpo container p-5" id="perguntas">     <!--  DIV PRINCIPAL  -->
        <div class="card bg-light">          <!-- CARD 1   -->
            <div class="card-header" id="ask1"> <!-- PERGUNTA  1 -->
                <h4 class="mb-0"> 
                    <button class="btn" data-toggle="collapse" data-target="#resp1" aria-expanded="false" aria-controls="ask1">
                        <strong> Como funciona o Cadastro de Alunos? </strong>
                    </button>
                </h4>
            </div>      <!-- FIM PERGUNTA   -->
                <div id="resp1" class="collapse show" aria-labelledby="ask1" data-parent="#perguntas">   <!-- RESPOSTA   -->
                    <div class="card-body"> <!-- TEXTO DA RESPOSTA   -->
                    Para realizar o cadastro de alunos é necessário preencher todos os campos de texto presentes. Os dados devem ser válidos e seguir a formatação indicada nas caixas de texto. Note que, caso o formulário esteja preenchido e possuir algum campo vazio ou inválido o cadastro não será feito e confirmado. Caso os campos estiverem totalmente preenchidos e validados, um botão 'Cadastrar' ficará visível e indicará que os dados são válidos.
                    </div>
                </div>  <!-- FIM RESPOSTA   -->
        </div>      <!-- FIM DO CARD DA PERGUNTA 1  -->

        <div class="card bg-light">          <!-- CARD 2   -->
            <div class="card-header" id="ask2"> <!-- PERGUNTA  2 -->
                <h4 class="mb-0"> 
                    <button class="btn" data-toggle="collapse" data-target="#resp2" aria-expanded="false" aria-controls="ask2">
                        <strong> Como confirmar o cadastro de alunos?  </strong>
                    </button>
                </h4>
            </div>      <!-- FIM PERGUNTA   -->
                <div id="resp2" class="collapse show" aria-labelledby="ask2" data-parent="#perguntas">   <!-- RESPOSTA   -->
                    <div class="card-body"> <!-- TEXTO DA RESPOSTA   -->
                    Os dados devem ser válidos e seguir a formatação indicada nas caixas de texto. Note que, caso o formulário esteja preenchido e possuir algum campo vazio ou inválido o cadastro não será feito e confirmado. Caso os campos estiverem totalmente preenchidos e validados, um botão 'Cadastrar' ficará visível e indicará que os dados são válidos
                    </div>
                </div>  <!-- FIM RESPOSTA   -->
        </div>    

        <div class="card bg-light">          <!-- CARD 3   -->
            <div class="card-header" id="ask3"> <!-- PERGUNTA  3 -->
                <h4 class="mb-0"> 
                    <button class="btn" data-toggle="collapse" data-target="#resp3" aria-expanded="false" aria-controls="ask3">
                        <strong> Como ter acesso às informações dos alunos da instituição?  </strong>
                    </button>
                </h4>
            </div>      <!-- FIM PERGUNTA   -->
                <div id="resp3" class="collapse show" aria-labelledby="ask3" data-parent="#perguntas">   <!-- RESPOSTA   -->
                    <div class="card-body"> <!-- TEXTO DA RESPOSTA   -->
                    Para ter acesso às informações dos alunos é necessário acessar a página 'Listagem de Alunos' disponível no menu superior. Nesta pagina será possível analisar, caso existam alunos cadastrados, o nome e o CPF dos alunos. Para visualizar os demais dados, deve-se clicar no botão amarelo (ícone de olho) ao lado do CPF do aluno em questão. Caso não exista alunos cadastrados, haverá um aviso na tela com esta informação.
                    </div>
                </div>  <!-- FIM RESPOSTA   -->
        </div>    

        <div class="card bg-light">          <!-- CARD 4   -->
            <div class="card-header" id="ask4"> <!-- PERGUNTA  4 -->
                <h4 class="mb-0"> 
                    <button class="btn" data-toggle="collapse" data-target="#resp4" aria-expanded="false" aria-controls="ask4">
                        <strong> Como editar as informações dos alunos da instituição?  </strong>
                    </button>
                </h4>
            </div>      <!-- FIM PERGUNTA   -->
                <div id="resp4" class="collapse show" aria-labelledby="ask4" data-parent="#perguntas">   <!-- RESPOSTA   -->
                    <div class="card-body"> <!-- TEXTO DA RESPOSTA   -->
                    Para ter acesso às informações dos alunos é necessário acessar a página 'Página do Administrador' disponível no menu superior. Nesta pagina será possível analisar, caso existam alunos cadastrados, o nome e o CPF dos alunos. Para editar os demais dados, deve-se clicar no botão azul (ícone de lápis) ao lado do CPF do aluno em questão. Para deletar o cadastro do aluno, deve-se clicar no botão vermelho (ícone de lata de lixo) ao lado do CPF do aluno em questão. Caso não exista alunos cadastrados, haverá um aviso na tela com esta informação.
                    </div>
                </div>  <!-- FIM RESPOSTA   -->
        </div>    

        <div class="card bg-light">          <!-- CARD 5   -->
            <div class="card-header" id="ask5"> <!-- PERGUNTA  5 -->
                <h4 class="mb-0"> 
                    <button class="btn" data-toggle="collapse" data-target="#resp5" aria-expanded="false" aria-controls="ask5">
                        <strong> Como funciona a tela Boss?  </strong>
                    </button>
                </h4>
            </div>      <!-- FIM PERGUNTA   -->
                <div id="resp5" class="collapse show" aria-labelledby="ask5" data-parent="#perguntas">   <!-- RESPOSTA   -->
                    <div class="card-body"> <!-- TEXTO DA RESPOSTA   -->
                    Na tela Boss é possível adicionar, editar e deletar usuários Administradores do sistema. Nesta tela também é possível controlar o grau de permissão de cada Administrador do sistema.
                    </div>
                </div>  <!-- FIM RESPOSTA   -->
        </div>   

    </div>      <!-- FIM DA DIV PRINCIPAL   -->
</body>
