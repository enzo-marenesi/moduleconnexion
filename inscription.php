<?php
$servername = "localhost";
$username = "enzo-marenesi";
$password = "123456789";
$dbname ="enzo-marenesi_moduleconnexion";


$conn= mysqli_connect("localhost","enzo-marenesi","123456789","enzo-marenesi_moduleconnexion");

if(isset($_POST['envoyer'])) {
$login = mysqli_real_escape_string($conn,htmlspecialchars($_POST['login'])); 
$password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));
    $sql_u = "SELECT * FROM utilisateurs WHERE login='$login'";
    $res_u = mysqli_query($conn, $sql_u);

    if(mysqli_num_rows($res_u) > 0) {
    }
    else {
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['passwordretype']) &&
    !empty($_POST['prenom']) && !empty($_POST['nom']) && $_POST['password'] == $_POST['passwordretype']) {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

    $query = "INSERT INTO utilisateurs (login,password,prenom,nom) VALUES ('$login', '$password' , '$prenom', '$nom' )";
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if($run) {
     header ("refresh:2;url=connexion.php");
    }
    else {
   
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
    <link rel="stylesheet" href="css/inscription.css">
    <title>Inscription</title>
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
        <div class="Titre55">
<h1>Inscription</h1> 
<br><p><i>________</i></p>
<p><b>Si votre inscription ce passe bien vous serez redirigé</b></p>
</div>
<div class="inscription2">
       <form method="POST" action=#>
           <div class="contact">
        <div class="contacter">
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Joe">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="...">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" placeholder="...">
        </div>
        <div class="contacter2">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Biden">
            <label for="passwordretype">Confirmez mot de passe</label>
            <input type="password" id="passwordretype" name="passwordretype" placeholder="...">
        </div>
    </div>
    <div class="buttonn">
    <input class="button" value="Envoyer" name ="envoyer" type="submit">
    </div> 
    </form>
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