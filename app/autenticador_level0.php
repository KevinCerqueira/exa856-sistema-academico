<?php 
// 0 = permissão total | 1 = ADM | 2 = somente aluno;
if($_SESSION['PERMISS'] !=0 ){
    header('Location: sorry.php');
    exit();
}