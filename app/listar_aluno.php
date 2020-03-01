<?php
include_once('_head.php');
include_once('autenticator.php');
include_once('autenticador_level0.php');
include_once('model.php');
$estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'];

$users = Model::getTable(
['u.ID'=>'a.usuario_ID', 'u.endereco_ID'=>'end_u.ID', 'a.curso_id'=>'c.ID', 'c.instituicao_ID'=>'i.ID', 'end_i.ID' => 'i.endereco_ID'], 
'usuario u, aluno a, endereco end_u , endereco end_i, curso c, instituicao i',
'u.ID, u.nome as nome_usuario, u.email, u.sobrenome, u.senha, u.CPF, u.RG, u.telefone,
a.data_nascimento, a.nome_pai, a.nome_mae,
end_u.ID as end_ID,end_u.cep, end_u.logradouro, end_u.numero, end_u.bairro, end_u.cidade, end_u.estado,
c.nome as nome_curso, i.nome as nome_intituicao, end_i.estado as estado_i, end_i.cidade as cidade_i', false);

?>


<body class="bg-light">
    <title>Listagem de Alunos</title>
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
                <a id="nav-first" class="nav-item nav-link text-light btn" href="dashboard.php">Início <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-light btn" href="cadastrar_aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item nav-link text-light text-white active btn btn-secondary border-20"
                         href="listar_aluno.php">Listagem de Alunos</a>
                <a class="nav-item nav-link text-light btn" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="boss.php">Boss</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="faq.php">Perguntas Frequentes</a>
                <a class="nav-item nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="corpo container-fluid p-5">
        <div class="container-fluid bg-white border-20 p-0">
            <!-- CONTEUDO -->
    <div conteudo class="container-fluid bg-white p-4"
        style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
        <p class="h3 ml-2 mb-3">Listagem de alunos cadastrados</p>
        
        <div class="container-fluid">
            <div id="parte-top">
                <div class="cadastrar-turma">
                    <a type="submit" class="btn btn-secondary" href="cadastrar-aluno.php">
                        <i class="fas fa-plus-circle"></i>
                        Cadastrar alunos
                    </a>
                </div>
            </div>
            <div id="parte-bottom">
                <nav class="navbar navbar-light">
                    <span class="navbar-brand mb-0 h1">Seus Alunos: </span>
                </nav>
                <div class="lista-de-alunos">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <?php if($users): ?>
                            <?php foreach($users as $indice=>$valor): ?>
                            <form method="POST" action="excluir_aluno.php" id="formulario">
                                <div class="card">
                                    <div class="instBotoes">
                                        <table class="table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CPF</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data><?= $users[$indice]['nome_usuario']?></td>
                                                    <td hora><?= $users[$indice]['CPF']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="botoes">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target=".bd-example-modal-xl" id="btnVisualizar"
                                                data-detalhe='<?=  json_encode($valor); ?>'>
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach ?>
                            <?php else: ?>
                            <div class="alert alert-secondary" role="alert">Não há alunos cadastrados.</div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <!-- MODAL EXIBIR DADOS DOS ALUNO-->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="row cadastro">
                    <div class="corpo-modal container-fluid p-4">
                        <div class="container-fluid bg-white border-20 p-4">

                            <div class="alert alert-danger alert-dismissible fade show" role="alert" CPF>
                                <strong>Este CPF já está cadastrado no sistema</strong>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" RG>
                                <strong>Este RG já está cadastrado no sistema</strong>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="adm_.php" name="atualizarAluno" id="formulario"
                                        autocomplete="off">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nome-aluno">Nome</label>
                                                <input required name="nome" type="text" class="form-control nome-text"
                                                    id="nome" placeholder="Nome" autocomplete="off">
                                                <input hidden name="usuario_ID" type="text" class="form-control"
                                                    id="usuario_ID">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sobrenome">Sobrenome</label>
                                                <input required name="sobrenome" type="text"
                                                    class="form-control nome-text" id="sobrenome"
                                                    placeholder="Sobrenome">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="telefone">Telefone</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">+55</div>
                                                    </div>
                                                    <input required maxlength="16" minlength="16" type="text"
                                                        name="telefone" id="telefone" class="form-control"
                                                        placeholder="(00) 0 0000-0000" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nascimento">Data de nascimento</label>
                                                <input required maxlength="10" minlength="10" type="text"
                                                    name="nascimento" id="nascimento" class="form-control"
                                                    placeholder="00/00/0000" aria-describedby="helpId">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="cpf">CPF</label>
                                                <input required minlength="14" maxlength="14" type="text" name="cpf"
                                                    id="cpf" class="form-control cpf-mask" placeholder="000.000.000-00"
                                                    aria-describedby="helpId">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rg">RG</label>
                                                <input required maxlength="12" minlength="12" type="text" name="rg"
                                                    id="rg" class="form-control" placeholder="00.000.000-0"
                                                    aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nome-mae">Nome completo da mãe</label>
                                            <input required type="text" name="mae" id="mae"
                                                class="form-control nome-text" placeholder="Nome da mãe"
                                                aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="nome-pai">Nome completo da pai</label>
                                            <input required type="text" name="pai" id="pai"
                                                class="form-control nome-text" placeholder="Nome da pai"
                                                aria-describedby="helpId">
                                        </div>
                                </div>
                                <div class="col-md-6" id="segunda-parte">
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="logradouro">Logradouro</label>
                                            <input required name="logradouro" type="text" class="form-control"
                                                id="logradouro" placeholder="Ex: Rua Antônio Marinho Falcão">
                                            <input hidden name="endereco_ID" type="text" class="form-control"
                                                id="endereco_ID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="bairro">Bairro</label>
                                            <input required name="bairro" type="text" class="form-control" id="bairro"
                                                placeholder="Ex: Zona rural">
                                        </div>
                                        <div class="col-md-4 row">
                                            <div class="form-group col-sm-8">
                                                <label for="numero">Número</label>
                                                <input required name="numero" minlength="1" maxlength="4" type="number"
                                                    class="form-control" id="numero" placeholder="0000">
                                                <small hidden id="feedback-numero" class="text-danger">N°
                                                    inválido</small>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="sn">S/N</label>
                                                <input name="sn" type="checkbox" id="sn">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cidade">Cidade</label>
                                            <input required name="cidade" type="text" class="form-control" id="cidade"
                                                placeholder="Ex: Salvador">
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
                                            <input required name="cep" type="text" class="form-control" id="cep"
                                                placeholder="00000-000">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="instituicao">Instituição</label>
                                            <select id="instituicao" name="instituicao" class="custom-select">
                                                <option value="1" selected>SysAcademy (Feira de Santana - BA)
                                                </option>
                                                <option value="2">SysAcademy (Ilhéus - BA)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="curso">Curso</label>
                                            <select id="curso" name="curso" class="custom-select">
                                                <option id="sys1pfirst" class="sys1" value="1">Engenharia de Computação
                                                </option>
                                                <option class="sys1" value="2">Ciência da Computação</option>
                                                <option class="sys1" value="3">Sistemas da Informação</option>
                                                <option class="sys1" value="4">Análise e Desenvolvimento de Sistemas
                                                </option>
                                                <option hidden id="sys2first" class="sys2" value="5">Engenharia de
                                                    Software</option>
                                                <option hidden class="sys2" value="6">Engenharia de Computação</option>
                                                <option hidden class="sys2" value="7">Redes de Computadores</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input required name="email" type="email" class="form-control" id="email"
                                            placeholder="exemplo@exemplo.com" autocomplete="off">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="senha">Senha</label>
                                            <input required name="senha" minlength="6" maxlength="8" type="password"
                                                class="form-control" id="senha" placeholder="Senha">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="senha-v">Repita a senha</label>
                                            <input required name="senha" minlength="6" maxlength="8" type="password"
                                                class="form-control" id="senha-v" placeholder="Repita a senha">
                                            <small hidden id="feedback-senha" class="text-danger">As senhas devem
                                                ser
                                                iguais!</small>
                                        </div>
                                    </div>
                                    <button hidden id="atualizar" type="submit"
                                        class="mt-4 btn btn-success float-right">Atualizar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function($) {
    let userAtual = null;


    $(document).on('click', '#btnVisualizar', e => {
        e.preventDefault()
        $(".form-group .is-valid, .form-group .is-invalid").removeClass("is-valid").removeClass(
            "is-invalid");

        $('.alert').hide();
        let valor = $(e.currentTarget).data('detalhe')
        let nome_intituicao = new String(valor.nome_intituicao + ' (' + valor.cidade_i + ' - ' + valor
            .estado_i + ')')

        $('#cpf').prop('disabled', true).val(valor.CPF);
        $('#rg').prop('disabled', true).val(valor.RG);
        $('#cep').prop('disabled', true).val(valor.cep);
        $('#numero').prop('disabled', true).val(valor.numero);
        $('#nascimento').prop('disabled', true).val(valor.data_nascimento);
        $('#telefone').prop('disabled', true).val(valor.telefone);
        $('#nome').prop('disabled', true).val(valor.nome_usuario);
        $('#sobrenome').prop('disabled', true).val(valor.sobrenome);
        $('#nascimento').prop('disabled', true).val(valor.data_nascimento);
        $('#mae').prop('disabled', true).val(valor.nome_mae);
        $('#pai').prop('disabled', true).val(valor.nome_pai);
        $('#logradouro').prop('disabled', true).val(valor.logradouro);
        $('#cidade').prop('disabled', true).val(valor.cidade);
        $('#bairro').prop('disabled', true).val(valor.bairro);
        $('#email').prop('disabled', true).val(valor.email);
        $('#estado').prop('disabled', true);
        $("#estado").val($(`option:contains(${valor.estado})`).val());
        $('#instituicao').prop('disabled', true);
        $("#instituicao").val($(`option:contains(${nome_intituicao})`).val());
        $('#curso').prop('disabled', true);
        $("#curso").val($(`option:contains(${valor.nome_curso})`).val());
        $('#senha').parent().hide()
        $('#senha-v').parent().hide()
        $('#sn').prop('disabled', true);
        if (valor.numero == 'S/N') {
            $('#sn').prop('checked', true)
        } else {
            $('#sn').prop('checked', false)
        }
        $(".corpo-modal").unbind('click')

    });
    $(document).keypress(function(e){
        e.preventDefault()
        if(evt.key === "Tab"){
            alert('A tecla tab foi pressionada');
        verificaCampos()
        }
	
       
	
  })

    $(document).on('click', '#btnEditar', e => {
        e.preventDefault()
        $(".corpo-modal").click(e => {
            $(e.currentTarget).mousemove(verificaCampos());
        })
        $(".corpo-modal").click(e=>{
            $(e.currentTarget).keypress(verificaCampos());
            $(e.currentTarget).keydown(verificaCampos());
        })

        $('.alert').hide();

        let valor = userAtual = $(e.currentTarget).data('detalhe')
        let nome_intituicao = new String(valor.nome_intituicao + ' (' + valor.cidade_i + ' - ' + valor
            .estado_i + ')')
        $('#usuario_ID').val(valor.ID);
        $('#endereco_ID').val(valor.end_ID);
        $('#cpf').prop('disabled', false).val(valor.CPF);
        $('#rg').prop('disabled', false).val(valor.RG);
        $('#cep').prop('disabled', false).val(valor.cep);
        $('#numero').prop('disabled', false).val(valor.numero);
        $('#nascimento').prop('disabled', false).val(valor.data_nascimento);
        $('#telefone').prop('disabled', false).val(valor.telefone);
        $('#nome').prop('disabled', false).val(valor.nome_usuario);
        $('#sobrenome').prop('disabled', false).val(valor.sobrenome);
        $('#nascimento').prop('disabled', false).val(valor.data_nascimento);
        $('#mae').prop('disabled', false).val(valor.nome_mae);
        $('#pai').prop('disabled', false).val(valor.nome_pai);
        $('#logradouro').prop('disabled', false).val(valor.logradouro);
        $('#cidade').prop('disabled', false).val(valor.cidade);
        $('#bairro').prop('disabled', false).val(valor.bairro);
        $('#email').prop('disabled', false).val(valor.email);
        $('#estado').prop('disabled', false);
        $("#estado").val($(`option:contains(${valor.estado})`).val());
        $('#instituicao').prop('disabled', false);
        $("#instituicao").val($(`option:contains(${nome_intituicao})`).val());
        $('#curso').prop('disabled', false);
        $("#curso").val($(`option:contains(${valor.nome_curso})`).val());
        $('#senha').val('').parent().show()
        $('#senha-v').val('').parent().show()
        $('#sn').prop('disabled', false);
        if (valor.numero == 'S/N') {
            $('#sn').prop('checked', true)
            $('#numero').prop('disabled', true)
        } else {
            $('#sn').prop('checked', false)
        }
    });
    $('#atualizar').click(e => {
        e.preventDefault()
        $('.alert').hide();
        let users_json = '<?=  json_encode($users); ?>'
        let users = JSON.parse(users_json)
        let procuraCPF = e => $('#cpf').val() == e.CPF && e.CPF != userAtual.CPF ? true : false;
        let procuraRG = e => $('#rg').val() == e.RG && e.RG != userAtual.RG ? true : false;
        let resultProcuraCPF = users.filter(procuraCPF)
        console.log(resultProcuraCPF)
        let resultProcuraRG = users.filter(procuraRG)
        console.log((resultProcuraRG))
        if (resultProcuraCPF && resultProcuraCPF.length) {
            $('#cpf').val('');
            $('[CPF].alert').show()
            $('[CPF].alert').alert()
        }
        if (resultProcuraRG && resultProcuraRG.length) {
            $('#rg').val('');
            $("[RG].alert").show()
            $("[RG].alert").alert();
        }

        if ($("[RG].alert").is(':hidden') && $('[CPF].alert').is(':hidden')) {
            $('#atualizar').unbind('click').click()
        }

    })


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
        document.getElementById('numero').value = '0000';
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
            $('#atualizar').removeAttr("hidden");
        } else {
            // $('#atualizar').removeAttr("hidden");
            $('#atualizar').attr("hidden", '');
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
})
</script>


<style>
.instBotoes {
    display: flex;
    flex-direction: row;
}

.botoes {
    display: flex;
    flex-direction: inline;
    align-items: center border;
}

.btn {
    padding: 10px;
    margin: 5px;
}

td,
th {
    padding: 0px 20px 0px 20px;
    width: 600px;
    text-align: center;
}

.cadastro {
    padding: 3px;
}
</style>