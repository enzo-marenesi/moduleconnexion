<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="moduleconnexion";


$conn= mysqli_connect("localhost","root","","moduleconnexion");

 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="image/minecraft.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Accueil</title>
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
        <div class="cadre">
            <div class="image">
            <img src="image/ill.jpg"width="105%">
            </div>
            <div class="textimg">
            <h2>Ninecraft</h2>
            <br><p><b>Ninecraft est un serveur PVP Faction basé sur la carte de la Terre. 
            Devenez le dirigeant que vous avez toujours voulu devenir et appliquez votre vision du monde.
            </b></p>    
            
            <div class="text">
                <div class="⚔">
                <h2>⚔</h2>
                <b>
                Stuffs, armes et outils
                <br>Utilisez des armes à feu, des missiles ou des bombes nucléaires, 
                ainsi que des centaines de blocs et objets uniques.</b>
                </div>
                <div class="💣">
                <h2>💣</h2>
                <b>
                Guerres et diplomatie
                <br>Gérez vos relations diplomatiques, 
                partez en guerre ou tissez des relations avec les autres factions du serveur.</b>
                </div>
            </div>
            </div>
        </div>
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


</body>
</html>