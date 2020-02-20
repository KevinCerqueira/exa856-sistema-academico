<?php 
session_start();
if(!$_SESSION['ID'] || !$_SESSION['NAME']){
    header('Location: index.php');
    exit();
}