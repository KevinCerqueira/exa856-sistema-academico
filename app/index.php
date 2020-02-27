<?php
session_start();
if (isset($_SESSION['ID'])) {
    header('Location: dashboard.php');
    exit();
}
include ('_head.php');
?>
<style>
    @media only screen and (max-width: 999px) {
        #corpo{
            /* margin-top: 10%; */
            padding-right: 0% !important;
            padding-left: 0% !important;
        }
    }
    #corpo{
        /* margin-top: 10%; */
        padding-right: 30%;
        padding-left: 30%;
    }
    #logo{
        width: 40%;
    }
</style>
<title>Login</title>
<body class="bg-dark">
    <div class="container-fluid p-2 text-center">
        <div id="corpo" class="">
            <div id="form-corpo" class="p-3 bg-white shadow border-20 mt-5">
                <img id="logo" src="logo.png" alt="SysAcademy">
                <p class="h3 text-dark">Sistema Acadêmico</p>
                <p class="">Olá! Insira seu usuário e senha.</p>
                <?php if(isset($_SESSION['invalid'])):?>
                    <div class="alert alert-danger" role="alert">
                        Usuário e/ou Senha incorretos.
                    </div>
                <?php unset($_SESSION['invalid']); endif;?>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="usuario" id="Usuario" class="form-control" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary rounded">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
