<?php
include '_head.php';
include 'autenticator.php';
include 'connection.php';
$estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];
// $sql = $dataBase->query("SELECT * FROM curso");
// $cursos = $sql->fetch_array();
?>
<style>
/* #sn {
    margin-top: 45%;
} */

#segunda-parte {
    margin-top: 5.4%;
}

.cabeca {
    margin-bottom: 6%;
}
</style>
<title>SysAcademy - Cadastre-se</title>

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
        <div onmousemove="verificaCampos()" class="container-fluid bg-white border-20 p-4">
            <?php if(isset($_SESSION['cpfExistente'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Este CPF já está cadastrado no sistema</strong>
            </div>

            <script>
            $(".alert").alert();
            </script>
            <?php unset($_SESSION['cpfExistente']);?>
            <?php elseif(isset($_SESSION['rgExistente'])):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Este RG já está cadastrado no sistema</strong>
            </div>

            <script>
            $(".alert").alert();
            </script>
            <?php unset($_SESSIO['rgExistente']);?>
            <?php endif;?>
            <div class="row">
                <div class="col-md-6">
                    <div class="cabeca">
                        <p class="h4 font-weight-light ms-auto ml-1 mt-1"><strong>Olá, estudante!</strong> falta pouco
                            para concluir seu cadastro...</p>
                    </div>

                    <form method="POST" action="cadastrar_aluno.php" name="cadastrarAluno" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome-aluno">Nome</label>
                                <input required onchange="verificaCampos()" name="nome" type="text"
                                    class="form-control nome-text" id="nome" placeholder="Nome" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sobrenome">Sobrenome</label>
                                <input required onchange="verificaCampos()" name="sobrenome" type="text"
                                    class="form-control nome-text" id="sobrenome" placeholder="Sobrenome">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+55</div>
                                    </div>
                                    <input required onchange="verificaCampos()" maxlength="16" minlength="16" type="text"
                                        name="telefone" id="telefone" class="form-control"
                                        placeholder="(00) 0 0000-0000" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nascimento">Data de nascimento</label>
                                <input required onchange="verificaCampos()" maxlength="10" minlength="10" type="text"
                                    name="nascimento" id="nascimento" class="form-control" placeholder="00/00/0000"
                                    aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cpf">CPF</label>
                                <input required onchange="verificaCampos()" minlength="14" maxlength="14" type="text" name="cpf"
                                    id="cpf" class="form-control cpf-mask" placeholder="000.000.000-00"
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rg">RG</label>
                                <input required onchange="verificaCampos()" maxlength="12" minlength="12" type="text" name="rg"
                                    id="rg" class="form-control" placeholder="00.000.000-0" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nome-mae">Nome completo da mãe</label>
                            <input required onchange="verificaCampos()" type="text" name="mae" id="mae"
                                class="form-control nome-text" placeholder="Nome da mãe" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="nome-pai">Nome completo da pai</label>
                            <input required onchange="verificaCampos()" type="text" name="pai" id="pai"
                                class="form-control nome-text" placeholder="Nome da pai" aria-describedby="helpId">
                        </div>
                </div>
                <div class="col-md-6" id="segunda-parte">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="logradouro">Logradouro</label>
                            <input required onchange="verificaCampos()" name="logradouro" type="text" class="form-control"
                                id="logradouro" placeholder="Ex: Rua Antônio Marinho Falcão">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input required onchange="verificaCampos()" name="bairro" type="text" class="form-control"
                                id="bairro" placeholder="Ex: Zona rural">
                        </div>
                        <div class="col-md-4 row">
                            <div class="form-group col-sm-8">
                                <label for="numero">Número</label>
                                <input required onchange="verificaCampos()" name="numero" minlength="1" maxlength="4"
                                    type="number" class="form-control" id="numero" placeholder="0000">
                                <small hidden id="feedback-numero" class="text-danger">N° inválido</small>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="sn">S/N</label>
                                <input name="sn" onchange="verificaCampos()" type="checkbox" id="sn">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input required onchange="verificaCampos()" name="cidade" type="text" class="form-control"
                                id="cidade" placeholder="Ex: Salvador">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option selected>AC</option>
                                <?php foreach($estados as $estado): ?>
                                <option><?php echo $estado;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cep">CEP</label>
                            <input required onchange="verificaCampos()" name="cep" type="text" class="form-control" id="cep"
                                placeholder="00000-000">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="instituicao">Instituição</label>
                            <select id="instituicao" name="instituicao" class="custom-select">
                                <option value="1" selected>SysAcademy (Feira de Santana - BA)</option>
                                <option value="2">SysAcademy (Ilhéus - BA)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="curso">Curso</label>
                            <select id="curso" name="curso" class="custom-select">
                                <option id="sys1pfirst" class="sys1" value="1">Engenharia de Computação</option>
                                <option class="sys1" value="2">Ciência da Computação</option>
                                <option class="sys1" value="3">Sistemas da Informação</option>
                                <option class="sys1" value="4">Análise e Desenvolvimento de Sistemas</option>
                                <option hidden id="sys2first" class="sys2" value="5">Engenharia de Software</option>
                                <option hidden class="sys2" value="6">Engenharia de Computação</option>
                                <option hidden class="sys2" value="7">Redes de Computadores</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input required onchange="verificaCampos()" name="email" type="email" class="form-control" id="email"
                            placeholder="exemplo@exemplo.com" autocomplete="off">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input required onchange="verificaCampos()" name="senha" minlength="6" maxlength="8" type="password"
                                class="form-control" id="senha" placeholder="Senha">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha-v">Repita a senha</label>
                            <input required onchange="verificaCampos()" name="senha" minlength="6" maxlength="8" type="password"
                                class="form-control" id="senha-v" placeholder="Repita a senha">
                            <small hidden id="feedback-senha" class="text-danger">As senhas devem ser iguais!</small>
                        </div>
                    </div>
                    <button hidden onselect="verificaCampos()" onmousewheel="verificaCampos()" id="cadastrar"
                        type="submit" class="mt-4 btn btn-success float-right">Cadastrar</button>
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
$('#instituicao').change(function() {
    if ($('#instituicao').val() == 1) {
        $('.sys2').attr('hidden', '');
        $('.sys1').removeAttr("hidden");
        $('#sys2first').removeAttr("selected");
        $('#sys1first').attr('selected', '');
    }
    if ($('#instituicao').val() == 2) {
        $('.sys1').attr('hidden', '');
        $('.sys2').removeAttr("hidden");
        $('#sys1first').removeAttr("selected");
        $('#sys2first').attr('selected', '');
    }
});

function verificaCampos() {

    trava = 0;

    if ($('#senha-v').val() != $('#senha').val()) {
        $('#senha').removeClass('is-valid');
        $('#senha-v').removeClass('is-valid');
        $('#senha').addClass('is-invalid');
        $('#senha-v').addClass('is-invalid');
        $('#feedback-senha').removeAttr("hidden");
        trava++;
    } else {
        if ($('#senha-v').val().length < 6) {
            $('#senha-v').removeClass('is-valid');
            $('#senha-v').addClass('is-invalid');
            trava++;
        } else {
            $('#senha-v').removeClass('is-invalid');
            $('#senha-v').addClass('is-valid');
        }
        if ($('#senha').val().length < 6) {
            $('#senha').removeClass('is-valid');
            $('#senha').addClass('is-invalid');
            trava++;
        } else {
            $('#senha').removeClass('is-invalid');
            $('#senha').addClass('is-valid');
        }
        $('#feedback-senha').attr("hidden", '');
    }
    // NOME
    if ($('#nome').val() == "") {
        $('#nome').removeClass('is-valid');
        $('#nome').addClass('is-invalid');
        trava++;
    } else {
        $('#nome').removeClass('is-invalid');
        $('#nome').addClass('is-valid');
    }
    // sobrenome
    if ($('#sobrenome').val() == "") {
        $('#sobrenome').removeClass('is-valid');
        $('#sobrenome').addClass('is-invalid');
        trava++;
    } else {
        $('#sobrenome').removeClass('is-invalid');
        $('#sobrenome').addClass('is-valid');
    }
    // telefone
    if ($('#telefone').val().length < 14) {
        $('#telefone').removeClass('is-valid');
        $('#telefone').addClass('is-invalid');
        trava++;
    } else {
        $('#telefone').removeClass('is-invalid');
        $('#telefone').addClass('is-valid');
    }
    // nascimento
    if ($('#nascimento').val().length < 10) {
        $('#nascimento').removeClass('is-valid');
        $('#nascimento').addClass('is-invalid');
        trava++;
    } else {
        $('#nascimento').removeClass('is-invalid');
        $('#nascimento').addClass('is-valid');
    }
    // cpf
    if ($('#cpf').val().length < 14) {
        $('#cpf').removeClass('is-valid');
        $('#cpf').addClass('is-invalid');
        trava++;
    } else {
        $('#cpf').removeClass('is-invalid');
        $('#cpf').addClass('is-valid');
    }
    // rg
    if ($('#rg').val().length < 12) {
        $('#rg').removeClass('is-valid');
        $('#rg').addClass('is-invalid');
        trava++;
    } else {
        $('#rg').removeClass('is-invalid');
        $('#rg').addClass('is-valid');
    }
    // mae
    if ($('#mae').val() == "") {
        $('#mae').removeClass('is-valid');
        $('#mae').addClass('is-invalid');
        trava++;
    } else {
        $('#mae').removeClass('is-invalid');
        $('#mae').addClass('is-valid');
    }
    // pai
    if ($('#pai').val() == "") {
        $('#pai').removeClass('is-valid');
        $('#pai').addClass('is-invalid');
        trava++;
    } else {
        $('#pai').removeClass('is-invalid');
        $('#pai').addClass('is-valid');
    }
    // logradouro
    if ($('#logradouro').val() == "") {
        $('#logradouro').removeClass('is-valid');
        $('#logradouro').addClass('is-invalid');
        trava++;
    } else {
        $('#logradouro').removeClass('is-invalid');
        $('#logradouro').addClass('is-valid');
    }
    // cidade
    if ($('#cidade').val() == "") {
        $('#cidade').removeClass('is-valid');
        $('#cidade').addClass('is-invalid');
        trava++;
    } else {
        $('#cidade').removeClass('is-invalid');
        $('#cidade').addClass('is-valid');
    }
    // bairro
    if ($('#bairro').val() == "") {
        $('#bairro').removeClass('is-valid');
        $('#bairro').addClass('is-invalid');
        trava++;
    } else {
        $('#bairro').removeClass('is-invalid');
        $('#bairro').addClass('is-valid');
    }
    // // numero
    if (!$('#sn').is(':checked')) {
        if ($('#numero').val() == "" || $('#numero').val() == '0') {
            $('#numero').removeClass('is-valid');
            $('#numero').addClass('is-invalid');
            trava++;
        } else {
            $('#numero').removeClass('is-invalid');
            $('#numero').addClass('is-valid');
        }
    } else {
        $('#numero').removeClass('is-invalid');
        $('#numero').addClass('is-valid');
    }

    if ($('#numero').val() == '0') {
        $('#feedback-numero').removeAttr("hidden");
        trava++;
    } else {
        $('#feedback-numero').attr("hidden", '');
    }
    // cep
    if ($('#cep').val().length < 9) {
        $('#cep').removeClass('is-valid');
        $('#cep').addClass('is-invalid');
        trava++;
    } else {
        $('#cep').removeClass('is-invalid');
        $('#cep').addClass('is-valid');
    }
    // email
    if ($('#email').val() == "") {
        $('#email').removeClass('is-valid');
        $('#email').addClass('is-invalid');
        trava++;
    } else {
        $('#email').removeClass('is-invalid');
        $('#email').addClass('is-valid');
    }
    if (trava == 0) {
        $('#cadastrar').removeAttr("hidden");
    } else {
        // $('#cadastrar').removeAttr("hidden");
        $('#cadastrar').attr("hidden", '');
    }
}
$('#sn').click(function(e) {
    if (!$('#sn').is(':checked')) {
        if ($('#numero').val() == "") {
            $('#numero').removeClass('is-valid');
            $('#numero').addClass('is-invalid');
            trava++;
        } else {
            $('#numero').removeClass('is-invalid');
            $('#numero').addClass('is-valid');
        }
    } else {
        $('#numero').removeClass('is-invalid');
        $('#numero').addClass('is-valid');
    }
});
</script>