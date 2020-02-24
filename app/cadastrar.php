<?php
include(dirname(__FILE__) . '/template/_head.php');
include('autenticator.php');
function renderTitle($title, $subtitle) {
    require_once(dirname(__FILE__) . "/template/title.php");
}
renderTitle(
    'Cadastro de Aluno',
    'Crie o Aluno'
);
?>

<body>
    <form>
        <div class="container-fluid bg-white p-4">
            <div class="form-row">
                <div class="col-md-4 mb-3 p-1">
                    <label for="inputNome">Primeiro nome</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Nome" value="Mark" required>
                </div>
                <div class="col-md-4 mb-3 p-1">
                    <label for="inputSobrenome">Sobrenome</label>
                    <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" value="Otto"
                        required>
                </div>
                <div class="form-group col-md-4 mb-3 p-1">
                    <label for="nomeCurso">Curso</label>
                    <select class="custom-select" id="nomeCurso" required>
                        <option value="">Selecione...</option>
                        <option value="1">Eng.Computação</option>
                        <option value="2">Eng.Civil</option>
                        <option value="3">Eng.Alimentos</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 p-1">
                    <label for="cpfCadastro">CPF</label>
                    <input aria-describedby="cpfHelp" name="cpf" id="cpfCadastro" placeholder="00000000000" type="text"
                        minlength="11" inputmode="number" maxlength="11" class="form-control" required
                        pattern="[0-9]{11}" title="Informe apenas os numeros do CPF sem '.' e sem '-'.">
                </div>

                <div class="col-md-4 p-1">
                    <label for="data">Data de nascimento</label>
                    <input class="form-control" type="date" id="data" max="" name="data" required>
                </div>
                <div class="col-md-4 p-1">
                    <label for="inputFone" class="control-label">Telefone</label>
                    <input type="text" class="form-control" id="inputFone" placeholder="Telefone"
                        pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" required>
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-6 mb-3 p-1">
                    <label for="inputCidade">Cidade</label>
                    <input type="text" class="form-control" id="inputCidade" placeholder="Cidade" required>
                    <div class="invalid-feedback">
                        Por favor, informe uma cidade válida.
                    </div>
                </div>
                <div class="form-group col-md-3 p-1">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" class="form-control">
                        <option selected>Selecione...</option>
                        <option>Bahia</option>
                        <option>Maranhão</option>
                        <option>Sergipe</option>
                        <option>Ceará</option>
                        <option>Piauí</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, informe um estado válido.
                    </div>
                </div>
                <div class="col-md-3 mb-3 p-1">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" id="inputCEP" placeholder="CEP" required>
                    <div class="invalid-feedback">
                        Por favor, informe um CEP válido.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                    <label class="form-check-label" for="invalidCheck3">
                        Concordo com os termos e condições
                    </label>
                    <div class="invalid-feedback">
                        Você deve concordar, antes de continuar.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
</body>

<style>
.container-fluid {
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px
}
</style>