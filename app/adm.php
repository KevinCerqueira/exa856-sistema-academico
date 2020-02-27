<?php
include_once('_head.php');
include_once('autenticator.php');
include_once('autenticador_level0.php');
include_once('adm_.php');

$users = Adm::getTable(
['u.ID'=>'a.usuario_ID', 'u.endereco_ID'=>'end_u.ID', 'a.curso_id'=>'c.ID', 'c.instituicao_ID'=>'i.ID'], 
'usuario u, aluno a, endereco end_u, curso c, instituicao i',
'u.ID, u.nome as nome_usuario, u.email, u.sobrenome, u.senha, u.CPF, u.RG, u.telefone,
a.data_nascimento, a.nome_pai, a.nome_mae,
end_u.cep, end_u.logradouro, end_u.numero, end_u.bairro, end_u.cidade, end_u.estado,
c.nome as nome_curso, i.nome as nome_intituicao');

?>


<body class="bg-light">
    <title>Dashboard - ADM</title>
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
            <a id="nav-first" class="nav-item nav-link text-light" href="dashboard.php">Início <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-light btn" href="cadastrar_aluno.php">Cadastramento do Aluno</a>
                <a class="nav-item nav-link text-light btn" href="listar_aluno.php">Listagem de Alunos</a>
                <a class="nav-item nav-link text-light text-white active btn btn-secondary border-20" href="adm.php">Página do Administrador</a>
                <a class="nav-item ml-3 nav-link text-light btn border-20" href="boss.php">Boss</a>
                <a class="nav-item nav-link text-light ml-4 text-dark btn btn-light border-10" href="exit.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="corpo container-fluid p-5">
        <div class="container-fluid bg-white border-20 p-0">
            <p class="h2">PAGINA DO ADM</p>
        </div>
    </div>
    <!-- CONTEUDO -->
    <div class="container-fluid bg-white p-4"
        style="border-bottom-right-radius:30px;border-bottom-left-radius:30px;border-top-right-radius:30px;border-top-left-radius:30px">
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editarTurma{{$turma['ID']}}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
    <!-- MODAL EXIBIR DADOS DOS ALUNO-->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="row cadastro">
                    <div class="col-md-6">
                        <form method="POST" action="cadastrar_aluno.php" name="cadastrarAluno" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome-aluno">Nome</label>
                                    <input required onchange="verificaCampos()" name="nome" type="text"
                                        class="form-control nome-text" id="nome" placeholder="Nome" autocomplete="off"
                                        readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input required onchange="verificaCampos()" name="sobrenome" type="text"
                                        class="form-control nome-text" id="sobrenome" placeholder="Sobrenome" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+55</div>
                                        </div>
                                        <input required onchange="verificaCampos()" maxlength="16" minlength="16"
                                            type="text" name="telefone" id="telefone" class="form-control"
                                            placeholder="(00) 0 0000-0000" aria-describedby="helpId" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nascimento">Data de nascimento</label>
                                    <input required onchange="verificaCampos()" maxlength="10" minlength="10"
                                        type="text" name="nascimento" id="nascimento" class="form-control"
                                        placeholder="00/00/0000" aria-describedby="helpId" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF</label>
                                    <input required onchange="verificaCampos()" minlength="14" maxlength="14"
                                        type="text" name="cpf" id="cpf" class="form-control cpf-mask"
                                        placeholder="000.000.000-00" aria-describedby="helpId" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rg">RG</label>
                                    <input required onchange="verificaCampos()" maxlength="12" minlength="12"
                                        type="text" name="rg" id="rg" class="form-control" placeholder="00.000.000-0"
                                        aria-describedby="helpId" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nome-mae">Nome completo da mãe</label>
                                <input required onchange="verificaCampos()" type="text" name="mae" id="mae"
                                    class="form-control nome-text" placeholder="Nome da mãe" aria-describedby="helpId"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="nome-pai">Nome completo da pai</label>
                                <input required onchange="verificaCampos()" type="text" name="pai" id="pai"
                                    class="form-control nome-text" placeholder="Nome da pai" aria-describedby="helpId"
                                    readonly>
                            </div>
                    </div>
                    <div class="col-md-6" id="segunda-parte">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="logradouro">Logradouro</label>
                                <input required onchange="verificaCampos()" name="logradouro" type="text"
                                    class="form-control" id="logradouro" placeholder="Ex: Rua Antônio Marinho Falcão"
                                    readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bairro">Bairro</label>
                                <input required onchange="verificaCampos()" name="bairro" type="text"
                                    class="form-control" id="bairro" placeholder="Ex: Zona rural" readonly>
                            </div>
                            <div class="col-md-4 row">
                                <div class="form-group col-sm-8">
                                    <label for="numero">Número</label>
                                    <input required onchange="verificaCampos()" name="numero" minlength="1"
                                        maxlength="4" type="number" class="form-control" id="numero" placeholder="0000"
                                        readonly>
                                    <small hidden id="feedback-numero" class="text-danger">N° inválido</small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="sn">S/N</label>
                                    <input name="sn" onchange="verificaCampos()" type="checkbox" id="sn" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cidade">Cidade</label>
                                <input required onchange="verificaCampos()" name="cidade" type="text"
                                    class="form-control" id="cidade" placeholder="Ex: Salvador" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" readonly>
                                    <option selected></option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cep">CEP</label>
                                <input required onchange="verificaCampos()" name="cep" type="text" class="form-control"
                                    id="cep" placeholder="00000-000" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="instituicao">Instituição</label>
                                <select id="instituicao" name="instituicao" class="custom-select" readonly>
                                    <option selected></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="curso">Curso</label>
                                <select id="curso" name="curso" class="custom-select" readonly>
                                    <option selected></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input required onchange="verificaCampos()" name="email" type="email" class="form-control"
                                id="email" placeholder="exemplo@exemplo.com" autocomplete="off" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="senha">Senha</label>
                                <input required onchange="verificaCampos()" name="senha" minlength="6" maxlength="8"
                                    type="password" class="form-control" id="senha" placeholder="Senha" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="senha-v">Repita a senha</label>
                                <input required onchange="verificaCampos()" name="senha" minlength="6" maxlength="8"
                                    type="password" class="form-control" id="senha-v" placeholder="Repita a senha"
                                    readonly>
                                <small hidden id="feedback-senha" class="text-danger">As senhas devem ser
                                    iguais!</small>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/foundation.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.3.3/css/normalize.css"></script>
<script>
$(document).on('click', '#btnVisualizar', e => {
    e.preventDefault()
    let valor = $(e.currentTarget).data('detalhe')
    console.log(valor.nome_usuario)
    $('#cpf').attr('value', valor.CPF);
    $('#rg').attr('value', valor.RG);
    $('#cep').attr('value', valor.cep);
    $('#numero').attr('value', valor.numero);
    $('#nascimento').attr('value', valor.data_nascimento);
    $('#telefone').attr('value', valor.telefone);
    $('#nome').attr('value', valor.nome_usuario)
    $('#sobrenome').attr('value', valor.sobrenome)
    $('#nascimento').attr('value', valor.data_nascimento)
    $('#mae').attr('value', valor.nome_mae)
    $('#pai').attr('value', valor.nome_pai)
    $('#logradouro').attr('value', valor.logradouro)
    $('#cidade').attr('value', valor.cidade)
    $('#bairro').attr('value', valor.bairro)
    $('#numero').attr('value', valor.numero)
    $('#email').attr('value', valor.email)
    $('#estado').prop('disabled', true);
    $('#estado').children().html(`<option selected>${valor.estado}</option>`)
    $('#instituicao').prop('disabled', true);
    $('#instituicao').children().html(`<option selected>${valor.nome_intituicao}</option>`)
    $('#curso').prop('disabled', true);
    $('#curso').children().html(`<option selected>${valor.nome_curso}</option>`)
    $('#senha').parent().hide()
    $('#senha-v').parent().hide()
    $('#sn').prop('disabled', true);
    if(valor.numero == 'S/N'){
        $('#sn').attr('checked',true)
    }else{
        $('#sn').attr('checked',false)
    }
});
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
    padding: 50px;
}
</style>