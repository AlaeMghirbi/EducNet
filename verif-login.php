<?php
//connexion vers la bd
require_once "connection.php";
//démarrer la session pour envoyer une session 
session_start();
//verifier s'il y a des champs formulaire
if($_POST)
{
	//récupération des champs formulaire sous la forme $name
	extract($_POST);
    if(empty(trim($name)) || empty(trim($password)))
    {
        $_SESSION['info'] = "Invalid name or Password";
        header("location:index.php");
        exit;
    }
    $name = trim($name);
    $password = trim($password);
    $req = "select * from users where name = '$name' and password =md5('$password')";
    $res = mysqli_query($link, $req);
    $count = mysqli_num_rows($res);
	//s'il n 'y a pas d'enregistrement
    if($count==0)
    {
        $_SESSION['info'] = "User not found";
        header("location:index.php");
        exit;
    }
    else
	{
        $user = mysqli_fetch_assoc($res);
		//récupération de l'utilisateur dans une session
        $_SESSION['user'] = $user;
        header("location:dashbord.php");
        exit;
    }
}
?>