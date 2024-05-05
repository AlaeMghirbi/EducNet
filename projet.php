
<?php
require_once "connection.php";
require_once "securite.php";
if($_GET)
{
//la recherche  necessite l'evoie de $search et $filter
extract($_GET);
$req = "select * from projet where $filter like '%$search%'";
}
else
{
//la recherche ne necessite pas une recherche
$req = "select * from projet p,teacher t
where p.teacher_id=t.cin ";
}

$res = mysqli_query($con, $req);
$nb = mysqli_num_rows($res );
//pour récuperer les info
if(isset($_SESSION['info']))
$info = $_SESSION['info'];
unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
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
                <h3>User name</h3>
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
   <div class="principal">
    <div class="content">
        <fieldset>
        <legend><h2>Liste des projets</h2></legend>
            <div class="top">
                <a href="addProjet.php">Nouveau</a>
                <div>
                    <form>
                        <input type="text" placeholder="chercher par filtre"
                        name="search">
                        <select name="filter">
                        <option value="codeprojet">code projet</option>
                        <option value="libprojet">Libellé projet</option>
                        </select>
                        <button type="submit">Chercher</button>
                    </form>
                </div>
            </div>
            <?php
            if(!empty($info))
            echo "<span>$info</span>";
            ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Libellé</th>
                    <th>description</th>
                    <th>cin de responsable</th>
                    <th colspan="2">Action</th>
                </tr>
                
                <?php
                if ($nb ==0)
                echo"<tr><td colspan=8 align=center>Aucun résultat</td></tr>";
                else
                {
                while($lignes=mysqli_fetch_assoc($res))
                {
                ?>
                <tr>
                    <td><?php echo $lignes['idprojet']?></td>
                    <td><?php echo $lignes['codeprojet']?></td>
                    <td><?php echo $lignes['libprojet']?></td>
                    <td><?php echo $lignes['discription']?></td>
                    <td><?php echo $lignes['teacher_id']?></td>
                    <td align="center">
                    <a onclick = "return confirm('voulez vous modifié cette projet')"
                    href="editprojet.php?id=<?php echo $lignes['idprojet']?>">
                    <img src="img/edit.png" alt="">
                    </a>
                    <td align="center">
                    <a onclick = "return confirm('voulez vous supprimé cette projet')"
                    href="deleteprojet.php?id=<?php echo $lignes['idprojet']?>">
                    <img src="img/delete.png" alt="">
                    </a>
                    </td>
                </tr>
                <?php
                }
            }//fin else
                ?>
            </table>
        </fieldset>
    </div>
   </div> 
</body>
</html>