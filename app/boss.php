<?php
include('_head.php');
include('chefao_page.php');
include('autenticador_level0.php');
?>
<title>BOSS</title>
<style>
    @media only screen and (max-width: 999px) {
        .btn-ee{
            margin-top: 1% !important;
            margin-left: 0% !important;
        }
    }
</style>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <a class="navbar-brand text-white" href="dashboard.php">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Sistema Acadêmico
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a id="nav-first" class="nav-item nav-link text-light btn border-20" href="dashboard.php">Início</a>
                <a class="nav-item nav-link text-light btn border-20" href="cadastrar_aluno.php">Cadastramento do
                    Aluno</a>
                <a class="nav-item nav-link text-light btn border-20" href="listar_aluno.php">Listagem de Alunos</a>
                <a class="nav-item nav-link text-light btn border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn text-white active  btn-secondary border-20" href="boss.php">Boss</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="faq.php">Perguntas Frequentes</a>
                <a class="nav-item nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="corpo container-fluid p-5">
        <div class="container-fluid bg-white border-20 p-3">
            <p class="h3 mt-2 ml-3">Usuários</p>

            <?php if(isset($_SESSION['admEditarSucesso'])):?>
            <div class="alert alert-success" role="alert">
                <strong>Editado com sucesso</strong>
            </div>
            <?php unset($_SESSION['admEditarSucesso']);elseif(isset($_SESSION['admEditarErro'])):?>
            <div class="alert alert-danger" role="alert">
                <strong>Não foi possível Editar, houve algum erro.</strong>
            </div>
            <?php unset($_SESSION['admEditarErro']);?>
            <?php endif;?>
            <?php if(isset($_SESSION['admExcluirSucesso'])):?>
            <div class="alert alert-success" role="alert">
                <strong>Editado com sucesso</strong>
            </div>
            <?php unset($_SESSION['admExcluirSucesso']);elseif(isset($_SESSION['admExcluirErro'])):?>
            <div class="alert alert-danger" role="alert">
                <strong>Não foi possível Editar, houve algum erro.</strong>
            </div>
            <?php unset($_SESSION['admExcluirErro']);?>
            <?php endif;?>

            <?php
                foreach($adms as $adm):
            ?>
            <div class="container-fluid bg-white border-20 p-3 shadow mt-3">
                <form action="editar_adm.php" method="post">
                    <div class="form-row">
                        <div class="col-md-5 form-group">
                            <label for="nome-e">Usuário</label>
                            <input required minlength="3" maxlength="15" type="text" class="form-control"
                                name="nome" value="<?php echo $adm[1];?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="senha-e">Senha</label>
                            <input  minlength="6" maxlength="19" type="password"
                                class="form-control" name="senha">
                        </div>

                        <div class="col-md-1 form-group">
                            <label for="permissao-e">Permissão</label>

                            <select name="permissao" class="form-control" >
                                <?php if($adm[3] == 0):?>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <?php elseif($adm[3] == 1):?>
                                <option value="1" selected>1</option>
                                <option value="0">0</option>
                                <option value="2">2</option>
                                <?php elseif($adm[3] == 2):?>
                                <option value="2" selected>2</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="border-20 btn btn-primary ml-4 btn-ee" style="margin-top: 17%;">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                editar
                            </button>
                        </div>
                    </div>
                    <input name="ID" type="hidden" class="form-control" value="<?php echo $adm[0];?>">
                </form>
                <form action="excluir_adm.php" method="post">
                    <input name="ID" type="hidden" class="form-control" value="<?php echo $adm[0];?>">
                    <button type="submit" class="border-20 btn btn-danger ml-2 btn-ee">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        excluir
                    </button>
                </form>
            </div>

            <?php endforeach;?>
            <div class="mt-3 container-fluid bg-white border-20 p-3 shadow mt-1">
                <p class="h3">Cadastrar novo usuario</p>
                <?php if(isset($_SESSION['admCadSucesso'])):?>
                <div class="alert alert-success" role="alert">
                    <strong>Cadastrado com sucesso</strong>
                </div>
                <?php unset($_SESSION['admCadSucesso']);elseif(isset($_SESSION['admCadErro'])):?>
                <div class="alert alert-danger" role="alert">
                    <strong>Não foi possível cadastrar, houve algum erro.</strong>
                </div>
                <?php unset($_SESSION['admCadErro']);?>
                <?php endif;?>
                <form action="cadastrar_adm.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input minlength="3" maxlength="15" required name="nome" type="text" class="form-control"
                                id="nome" placeholder="Usuario" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="senha">Senha</label>
                            <input minlength="6" maxlength="19" required name="senha" type="password"
                                class="form-control" id="senha" placeholder="Senha">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="permissao">Nível de permissao</label>
                            <select name="permissao" class="form-control" id="permissao">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-success btn-ee" style="margin-top: 35%;">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>