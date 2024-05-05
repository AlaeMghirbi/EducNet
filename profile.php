<?php
require_once "connection.php";
require_once "securite.php";
//calculer le nombre de projet et le nombre d'etudiant
$fullname = $_SESSION['user']['nom']. ' '
.$_SESSION['user']['prenom'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

</head>
<body>
    <header class="header">
        <section class="flex">
            <a href="dashbord.php" class="logo">EducNet</a>
            <form action=""  method="post" class="search-form">
                <input type="text" name="search_box" placeholder="search project"
                required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_box"> </button>
            </form>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="toggel-btn" class="fas fa-sun"></div>
            </div>

            <div class="profile">
                <img src="img/pic-1.jpg" alt="">
                <h3>User name</h3>
                <a href="profile.php" class="btn">view profile</a>
                
            </div>
        </section>
    </header> 
    <div class="side-bar">
            <div class="profile">
                <img src="img/pic-1.jpg" alt="">
                <h3><?php
         echo $fullname ?></h3>
                <a href="profile.php" class="btn">view profile</a>
                
            </div>
            <nav class="navbar">
                <a href="dashbord.php"><i class="fas fa-home"></i><span>home</span></a>
                <a href="student.php"><i class="fas fa-chalkboard-user"></i><span>student</span></a>
                <a href="projet.php"><i class="fas fa-graduation-cap"></i><span>Projects</span></a>
                <a href="teacher.php"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
                <a href="contact.php"><i class="fas fa-headset"></i><span>contact us</span></a>
            </nav>
        
    </div> 

<section class="user-profile">

   <h1 class="heading">your profile</h1>

   <div class="info">

      <div class="user">
         <img src="img/pic-1.jpg" alt="">
         <h3><?php
         echo $fullname ?></h3>
         <p>user</p>
         <a href="logout.php" class="inline-btn">log out</a>
      </div>
   
      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-chalkboard-user"></i>
               <div>
                  <p>Teachers</p>
               </div>
            </div>
            <a href="teacher.php" class="inline-btn">view techers</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-chalkboard-user"></i>
               <div>
                  <p>Students</p>
               </div>
            </div>
            <a href="student.php" class="inline-btn">view students</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-graduation-cap"></i>
               <div>
                  
                  <p>Projects</p>
               </div>
            </div>
            <a href="projet.php" class="inline-btn">view projects</a>
         </div>
   
      </div>
   </div>

</section>














<footer class="footer">

   &copy; By <span>AlaeMghirbi</span>

</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>