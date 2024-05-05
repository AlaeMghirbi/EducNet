<?php
require_once "connection.php";
session_start();
if($_POST)
{
    extract($_POST);
    if(empty(trim($name)) ||empty(trim($password)))
    {
        $_SESSION['info']= "Champ(s) vide(s) .... "; 
        header("location:index.php");
        exit;
    }
    else
    {
        $name = trim ($_POST['name']);
        $password = trim ($_POST['password']);
        $query = "select * from users where login = '$name' and
        password =md5('$password')";
        //executer la requete
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        echo $count;
       
        if($count ==1)
        {
            
         $row = mysqli_fetch_assoc($result);
         $_SESSION['user'] = $row;
         header("location:dashbord.php");
         exit;
        }
        else
        {
            $_SESSION['info']= "name/password not found ";
            header("location:index.php");
            exit;
        }
        
    }


    
    
}//fin if
$info ="";
if(isset($_SESSION['info']))
    $info = $_SESSION['info'];
    
    
    
    unset($_SESSION['info']) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<body>
    
<div class="log">

    <div class="col imgLogin">
        <!-- <img src="img/logoo.png" > -->
    </div>
    
    <div class="col">
        <form  method="post" class="login-form">
            <p>LOG IN</p>
            <hr>
            <input type="text" name="name" id="name" placeholder="User Name">
            <input type="password" name="password" id="password"  placeholder="Password">
            <button type="submit">LOGIN</button>
            <?php
			//on recupere le message d'erreur
            if(!empty($info))
            echo "<span>$info</span>";
            ?>
        </form>
    </div>
</div>
</body>
</html>