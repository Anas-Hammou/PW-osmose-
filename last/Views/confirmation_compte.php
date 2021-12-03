<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de compte</title>
</head>
<style>
    .bouton{
    text-decoration: none;
    border: 2px solid black;
    font-size: 20px;
    color: black;
    background-color: lightgray;
    padding: 8px 80px; 
    margin-left: 42%;
}
</style>
<body>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }

     include_once '../Model/Utilisateur.php';
     include_once '../Controller/UtilisateurC.php';
    
    if (
        isset($_GET["username"]) &&
        isset($_GET["confirmation_key"])
    ) {
        if (
            !empty($_GET["username"]) && 
            !empty($_GET["confirmation_key"])
        ){
            $username = htmlspecialchars(urldecode($_GET['username'])); 
            $confirmation_key = $_GET['confirmation_key'];

            $utilisateurC = new UtilisateurC(); 
            $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($username); 

            $id_user = $utilisateur['id_user'] ; 
            $nom_user = $utilisateur['nom_user'] ; 
            $prenom_user = $utilisateur['prenom_user'] ; 
            $email_user = $utilisateur['email_user'] ; 
            $tel_user = $utilisateur['tel_user'] ;  
            $adresse_user = $utilisateur['adresse_user'] ; 
            $password_user = $utilisateur['password_user'] ; 
            $role_user = $utilisateur['role_user'] ;  
            $confirmation_key_bd = $utilisateur['confirmation_key'] ; 
            $confirme = $utilisateur['confirme'] ;

            if ($confirme == 0){
                if($confirmation_key_bd == $confirmation_key){
                    $utilisateur = new Utilisateur($nom_user,
                                    $prenom_user,
                                    $email_user,
                                    $tel_user,
                                    $adresse_user,
                                    $username,
                                    $password_user,
                                    $role_user, 
                                    $confirmation_key, 
                                    1
                    );
                    $utilisateurC->modifier_Utilisateur($utilisateur, $id_user);
                    echo "<center style='margin-top:10%;'><h1>Votre compte a bien été activé !</h1></center>";
                    if (isset($_SESSION['role_user']) && ($_SESSION["role_user"] == "Administrateur"))
                        echo '<a id="login" class="bouton" href="logout.php"> Connexion </a>';
                    else{
                        echo '<a id="login" class="bouton" href="login.php"> Connexion </a>';
                    }
                }else{
                    echo "<center style='margin-top:10%;'><h1>Les clés de confirmation ne correspondent pas !</h1></center>";
                    if (isset($_SESSION['role_user']) &&  $_SESSION["role_user"] == "Administrateur")
                        echo '<a id="login" class="bouton" href="logout.php"> Connexion </a>';
                    else{
                        echo '<a id="login" class="bouton" href="login.php"> Exit </a>';
                    }
                }
            }else{
                echo "<center style='margin-top:10%;'><h1>Votre compte a déjà été activé !</h1></center>";
                if (isset($_SESSION['role_user']) &&  $_SESSION["role_user"] == "Administrateur")
                    echo '<a id="login" class="bouton" href="logout.php"> Connexion </a>';
                else{
                    echo '<a id="login" class="bouton" href="login.php"> Exit </a>';
                }
            }
        }
    }
?>
</body>
</html>