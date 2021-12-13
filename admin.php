<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="moduleconnexion";


$conn= mysqli_connect("localhost","root","","moduleconnexion");
?>
<?php
session_start();

if($_SESSION['login'] != 'admin'){
    header('Location: index.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="image/minecraft.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>
<body class="acceuil">
<header>
        <div class="back">
            <div class="tmiddle">
            <h2><b>Ninecraft</b></h2>
            </div>
          <div class="middle"> 
                <img src="image/logo1-1.png"width="80px">
            </div>
            <div class="menu">
              <ul class="menuderoulant">
                  <li><a href="index.php">Home</a>
                </li>
              </ul>
              <ul class="menuderoulant">
                <li><a href="profil.php">Profil</a>
                  <ul class="sousmenu">
                  <?php
                 if (isset($_SESSION['login'])) {
                     echo "";
                     
                 }
                     else{
                         echo '
                         <li><a href="connexion.php">Connexion</a></li>
                             <li><a href="inscription.php">Inscription</a></li>
                         </ul>';
                     }
                 ?>
                  </ul>
              </li>
            </ul>
            <ul class="menuderoulant">
                <li><a href="admin.php">Admin</a>
              </li>
            </ul>
            <ul class="menuderoulant">
                <li><div class="topnav">
  <a  class="active"> 
      <?php  
      if (isset($_SESSION['login'])) {
      echo'
      <div id="menuprofil">
        <a  href = "deco.php?logout=1" >Déconnexion</a>
      </div>'; } ?> </a>
</div>
              </li>
            </ul>
            </div>    
        </div>  
        </header>
        <main>
<div class="tout">
    <div class = listuser> 
        <p><b>La liste des utilisateurs présent : </b></p>
<?php

$sql= mysqli_query ($conn,"SELECT login FROM utilisateurs");
$res= mysqli_fetch_all($sql); 

foreach ($res as $v1) {
    foreach ($v1 as $v2) {
        echo "<div class = listuser>"." => "."$v2"."<br>"."</div>";
    }
}

?>
</div>
    <div class="topnav">
        <a  class="active"> <?php  if (isset($_SESSION['login'])) {
        echo 'Connecté en tant que '.$_SESSION['login']; } ?> </a>
        <div id="menuprofil">
        <a  href = "deco.php?logout='1'" >Déconnexion</a>
        </div>
    </div>
</div>
<img class="imgg" src="image/pepe-cry.gif"width="25%">
</main>
<footer>
    <div class="footer">        
            <div class="outils">
                    <h2>Outils</h2>
                <div class="connexion">	
                    <a href="connexion.php"><b>Connexion</b></a>
                </div>
                <div class="inscription">	
                    <a href="inscription.php"><b>Inscription</b></a>
                </div>
                <div class="admin">	
                    <a href="admin.php"><b>Accès Admin</b></a>
                </div>
            </div>
            <div class="credits">
                    <h3>Copyright : © Ninecraft – tous droits réservés. Ninecraft est une marque déposée.</h3>	
            </div>
            <div class="github">
                <a href="https://github.com/enzo-marenesi" target="_blank"><img class="gitimg" src="image/github.png" width="100%"></a>
            </div>
    </div>        
</footer>
</div>
</body>
</html>