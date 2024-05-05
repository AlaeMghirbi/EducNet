<?php
session_start();
//s'il l'utilisateur n'est pas connecté
if(!isset($_SESSION['user']))
{
    $_SESSION['info'] = "Access denied";
    header("location:index.php");
    exit;
}
?>