<?php
include '_head.php';
include 'autenticator.php';
include 'connection.php';
$estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];
// $sql = $dataBase->query("SELECT * FROM curso");
// $cursos = $sql->fetch_array();
?>
<style>
#sn {
    margin-top: 45%;
}

#segunda-parte {
    margin-top: 5.4%;
}

.cabeca {
    margin-bottom: 6%;
}
</style>
<title>SysAcademy - Cadastra-se</title>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <a class="navbar-brand text-white" href="dashboard.php">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <span style="font-weight: lighter;">SysAcademy</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <!-- <a id="nav-first" class="nav-item nav-link text-white active btn btn-secondary border-20" href="dashboard.php">Início <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-light btn border-20" href="cadastrar_aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item nav-link text-light btn border-20" href="listar_aluno.php">Listagem de Alunos</a>
                <a class="nav-item nav-link text-light btn border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a> -->
            </div>
        </div>
    </nav>
    <div class="corpo container-fluid p-4">
        <div class="container-fluid bg-white border-20 p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="cabeca">
                        <p class="h4 font-weight-light ms-auto ml-1 mt-1"><strong>Olá, estudante!</strong> falta pouco
                            para concluir seu cadastro...</p>
                    </div>
                    <form name="cadastrarAluno" autocomplete="off" method="POST" action="cadastrar_aluno.php">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome-aluno">Nome</label>
                                <input type="text" class="form-control nome-text" id="nome-aluno" placeholder="Nome"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control nome-text" id="sobrenome" placeholder="Sobrenome"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+55</div>
                                    </div>
                                    <input maxlength="16" minlength="16" type="text" name="telefone" id="telefone"
                                    class="form-control" placeholder="(00) 0 0000-0000" aria-describedby="helpId"
                                    required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nascimento">Data de nascimento</label>
                                <input maxlength="10" minlength="10" type="text" name="nascimento" id="nascimento"
                                    class="form-control" placeholder="00/00/0000" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cpf">CPF</label>
                                <input minlength="14" maxlength="14" type="text" name="cpf" id="cpf"
                                    class="form-control cpf-mask" placeholder="000.000.000-00" aria-describedby="helpId"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rg">RG</label>
                                <input maxlength="12" minlength="12" type="text" name="rg" id="rg" class="form-control"
                                    placeholder="00.000.000-0" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome-mae">Nome completo da mãe</label>
                            <input type="text" name="nome_mae" id="nome-mae" class="form-control nome-text"
                                placeholder="Nome da mãe" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="nome-pai">Nome completo da pai</label>
                            <input type="text" name="nome_pai" id="nome-pai" class="form-control nome-text"
                                placeholder="Nome da pai" aria-describedby="helpId" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro"
                                    placeholder="Ex: Rua Antônio Marinho Falcão" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" placeholder="Ex: Zona rural"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">Número</label>
                                <input minlength="1" maxlength="4" type="number" class="form-control" id="numero"
                                    placeholder="0000" required>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="checkbox" id="sn">
                                <label for="sn">S/N</label>
                            </div>
                        </div>

                </div>
                <div class="col-md-6" id="segunda-parte">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" placeholder="Ex: Salvador">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState">Estado</label>
                            <select id="inputState" class="form-control">
                                <option selected>AC</option>
                                <?php foreach($estados as $estado): ?>
                                <option><?php echo $estado;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" placeholder="00000-000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instituicao">Instituição</label>
                        <input type="instituicao" class="form-control" id="instituicao"
                            value="SysAcademy (Feira de Santana)" autocomplete="off" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="curso">Curso</label>
                            <select name="curso" class="custom-select">
                                <option value="1" selected>Engenharia de Computação</option>
                                <option value="2">Ciência da Computação</option>
                                <option value="3">Sistemas da Informação</option>
                                <option value="4">Análise e Desenvolvimento de Sistemas</option>
                                <option value="5">Engenharia de Software</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="turno">Turno</label>
                            <select name="turno" class="custom-select">
                                <option value="1" selected>Matutino</option>
                                <option value="2">Vespertino</option>
                                <option value="3">Noturno</option>
                                <option value="4">Diurno</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="exemplo@exemplo.com"
                            autocomplete="off" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input minlength="6" maxlength="8" type="password" class="form-control" id="senha"
                                placeholder="Senha" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha-v">Repita a senha</label>
                            <input minlength="6" maxlength="8" type="password" class="form-control" id="senha-v"
                                placeholder="Repita a senha" required>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 btn btn-success float-right">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
$(".nome-text").on("input", function() {
    var regexp = /[^a-zA-Z]/g;
    if (this.value.match(regexp)) {
        $(this).val(this.value.replace(regexp, ''));
    }
});
$('#cpf').mask('000.000.000-00', {
    reverse: true
});
$('#rg').mask('00.000.000-0', {
    reverse: true
});
$('#cep').mask('00000-000', {
    reverse: true
});
$('#numero').mask('0000', {
    reverse: true
});
$('#nascimento').mask('00/00/0000', {
    reverse: true
});
$('#telefone').mask('00 0 0000-0000', {
    reverse: true
});
$('#sn').on("click", function(e) {
    if (document.getElementById('numero').disabled) {
        document.getElementById('numero').disabled = false;
        return;
    }
    document.getElementById('numero').disabled = true;
    document.getElementById('numero').value = '';
});

$('form[name="cadastrarAluno"]').submit(function(e) {
    if ($('#senha-v').val != "" && $('senha').val != "" && $('#senha-v').val === $('senha').val) {
        return alert('As senhas tem que ser iguais!');
    }
});
</script>