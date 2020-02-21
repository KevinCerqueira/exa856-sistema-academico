<?php 
if($_SESSION['NAME'] == 'grupoAvaliador'){
    header('Location: sorry.php');
    exit();
}