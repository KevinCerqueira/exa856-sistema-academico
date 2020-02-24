<?php 
// 0 = permissão total | 1 = adm e aluno | 2 = somente aluno;
if($_SESSION['PERMISS'] > 1){
    header('Location: sorry.php');
    exit();
}