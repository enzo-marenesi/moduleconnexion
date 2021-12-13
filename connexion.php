<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="moduleconnexion";


$conn= mysqli_connect("localhost","root","","moduleconnexion");


if(isset($_POST['login']) && isset($_POST['password'])){
    $login=$_POST['login'];
    $password=$_POST['password'];
    $sql= mysqli_query ($conn,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");
    $res= mysqli_fetch_all($sql); 
    $_SESSION['success'] = "";



    
    if (empty($res)) {
    }
     else {
         if($res[0][1] == $login){
            session_start();
            if ( $login == 'admin'){
                $_SESSION['login'] = $res[0][1];
                $_SESSION['nom'] = $res[0][3]; 
                $_SESSION['id'] = $res[0][0];
                $_SESSION['prenom'] = $res[0][2];
                $_SESSION['password'] = $res[0][4];
                header ("refresh:0.1;url=admin.php");
    
            }
            else {
                $_SESSION['login'] = $res[0][1];
                $_SESSION['nom'] = $res[0][3]; 
                $_SESSION['id'] = $res[0][0];
                $_SESSION['prenom'] = $res[0][2];
                $_SESSION['password'] = $res[0][4];

                header ("refresh:0.1;url=profil.php");

            }
         
     }
         else {
             
         }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="image/minecraft.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Connexion</title>
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
                      <li><a href="connexion.php">Connexion</a></li>
                      <li><a href="inscription.php">Inscription</a></li>
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
        <div class="Titre55">
<h1>Connexion</h1> 
<p><i>________</i></p>
<br><p><b>Si votre connexion ce passe bien vous serez redirigé</b></p>
</div>
<div class="inscription2">
   <div class="contact">
      <form action="connexion.php" method="post">
          <div class="contactgroup">
              <input type="login" name="login" class="contactcontrol" placeholder="Login" required="required">
              </div>
          <div class="contactgroup">
              <input type="password" name="password" class="contactcontrol" placeholder="Mot de passe" required="required">
              </div>    
    <div class="contactgroup">
              <button type="submit" class="button">Connexion</button>
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