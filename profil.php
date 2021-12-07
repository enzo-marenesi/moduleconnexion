<?php
$servername = "localhost";
$username = "enzo-marenesi";
$password = "123456789";
$dbname ="enzo-marenesi_moduleconnexion";


$conn= mysqli_connect("localhost","enzo-marenesi","123456789","enzo-marenesi_moduleconnexion");

session_start();
if (!isset($_SESSION['login'])) {
     $_SESSION['msg'] = "Vous devez être connecté";
     header('location: connexion.php');
 }  
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: connexion.php");
}
 ?>
<?php

if(isset($_POST['changelogin'])) {
$login = mysqli_real_escape_string($conn,htmlspecialchars($_POST['login'])); 
$password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));

    $sql_u = "SELECT * FROM utilisateurs WHERE login='$login'";
    $res_u = mysqli_query($conn, $sql_u);

    if(mysqli_num_rows($res_u) > 0) {
    }
    else {
        $login = $_POST['login'];
        $id = $_SESSION['id'];

    $query = "UPDATE utilisateurs SET login='$login' WHERE id='$id' "; 
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run) {
     header ("refresh:2;profil.php");
    }
        else {
        } 
    }
}


if(isset($_POST['changepassword'])) {

    $sql_pass = "SELECT * FROM utilisateurs WHERE password='$password'";
    $res_pass = mysqli_query($conn, $sql_pass);

    if($_POST['password'] != $_POST['passwordconfirm']) {
    }
        else {
            $password = $_POST['password'];
            $id = $_SESSION['id'];
    
        $query = "UPDATE utilisateurs SET password='$password' WHERE id='$id' "; 
        $run = mysqli_query($conn, $query) or die(mysqli_error());
    
        if($run) {
         header ("refresh:2;profil.php");
        }    
        else {
        }    
    }    
}

if(isset($_POST['changeprenom'])) {


    $prenom = $_POST['prenom'];
    $id = $_SESSION['id'];

    $sql_prenom = "SELECT * FROM utilisateurs WHERE prenom='$prenom'";
    $res_prenom = mysqli_query($conn, $sql_prenom);
    $query = "UPDATE utilisateurs SET prenom='$prenom' WHERE id='$id' "; 
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run) {
     header ("refresh:2;profil.php");
    }
    else {
    }     
}

if(isset($_POST['changenom'])) {

    $nom = $_POST['nom'];
    $id = $_SESSION['id'];

    $sql_nom = "SELECT * FROM utilisateurs WHERE nom='$nom'";
    $res_nom = mysqli_query($conn, $sql_nom);
    $query = "UPDATE utilisateurs SET nom='$nom' WHERE id='$id' "; 
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run) {
     header ("refresh:2;profil.php");
    }
    else {
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
    <link rel="stylesheet" href="css/profil.css">
    <title>Profil</title>
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
            </div>    
        </div>  
        </header>
<main>
<div class="page">
                <div class="pdp">
                    <img src="image/ch.png">
                </div>
<p><form method="POST" action = "profil.php">
<div class="tout">
<div class="formulaire">
<div class="login">
<h3>Login ⋎</h3>
<input type = "text" name = "login" id = "login" placeholder = <?php echo $_SESSION['login'];?>  /> <br> 
<input type = "submit" value = "Changer le login" name = "changelogin" class="button"/><br><br>
</div>
<div class="password">
<h3>Password ⋎</h3>
<input type = "password" name = "password" id = "password" placeholder = 'Nouveau mot de passe'  /><br>
<input type = "password" name = "passwordconfirm" id = "passwordconfirm" placeholder ='Confirmer le mot de passe' /><br>
<input type = "submit" value = "Changer le mot de passe" name = "changepassword" class="button"/><br><br>
</div>
</div>
<div class="formulaire2">
<div class="prenom">
<h3>Prenom ⋎</h3>
<input type = "text" name = "prenom" id = "prenom" placeholder = <?php echo $_SESSION['prenom'];?> /><br>
<input type = "submit" value = "Changer le prénom" name = "changeprenom" class="button"/><br><br>
</div>
<div class="nom">
<h3>Nom ⋎</h3>
<input type = "text" name = "nom" id = "nom" placeholder = <?php echo $_SESSION['nom'];?> /><br>
<input type = "submit" value = "Changer le nom" name = "changenom" class="button"/>  <br> 
</div>
</div>
<div class="troisiemeform">
<div class="topnav">
  <a  class="active"> <?php  if (isset($_SESSION['login'])) {
      echo 'Connecté en tant que '.$_SESSION['login']; } ?> </a>
  <div id="menuprofil">
    <a  href = "deco.php?logout='1'" >Déconnexion</a>
  </div>
</div>
</div>
</p></form>
</div>
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
</body>
</html>