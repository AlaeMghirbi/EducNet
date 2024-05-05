<?php
require_once "connection.php";
require_once "securite.php";
//calculer le nombre de projet et le nombre d'etudiant
$count1 = mysqli_num_rows(mysqli_query($con, "select * from student"));
$count2 = mysqli_num_rows(mysqli_query($con, "select * from projet"));
$count3 = mysqli_num_rows(mysqli_query($con, "select * from teacher"));
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
                <h3><?php echo $fullname ?></h3>
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
    <section class="home-grid">

   <h1 class="heading">quick options</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">DASHBOARD</h3>
         <p class="likes">total students: 
            <?php 
            echo $count1
            ?></p>
         <a href="student.php" class="inline-btn">view students </a>
         <p class="likes">total teachers: <?php 
            echo $count2
            ?></p>
         <a href="teacher.php" class="inline-btn">view teachers</a>
         <p class="likes">total projects : <?php 
            echo $count3
            ?></p>
         <a href="projet.php" class="inline-btn">view projects</a>
      </div>


      <div class="box">
         <h3 class="title">popular topics</h3>
         <div class="flex">
            <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
            <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
            <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
            <a href="#"><i class="fab fa-react"></i><span>react</span></a>
            <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
            <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">Get a Project</h3>
         <p class="tutor">
"Are you in search of an engaging project? Look no further! Get in touch with our skilled teachers today and embark on an exciting journey of learning and discovery. Don't hesitate, contact us now!"</p>
         <a href="teacher.php" class="inline-btn">get started</a>
      </div>

   </div>

</section>

<footer class="footer">

&copy; by <span> AlaeMghirbi</span> 

</footer>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>