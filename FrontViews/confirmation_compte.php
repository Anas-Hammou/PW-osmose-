<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation du compte</title>
</head>
<link rel="stylesheet" href="article.css">
<style>
    .input{
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        text-decoration:none; 
        font-size: 20px;
        padding: 12px 150px;
        background-color: aliceblue;
        border: 2px solid black;
        border-radius: 5px;
        position:relative;
        margin-left: 39%;
    }
    .input:hover{
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        text-decoration:none; 
        font-size: 20px;
        padding: 12px 150px;
        background-color: #f7c2f9;
        border: 2px solid black;
        border-radius: 5px;
        position:relative;
        margin-left: 39%;
    }
</style>
<body>
    <!-- Header -->
	<?php require 'bar.php'; ?>
	<!-- Tache confimation compte -->
<?php 

ob_start();
    if(!isset($_SESSION)){
        session_start();
    }
        /*if (isset($_SESSION["username"]))
        {
            if ($_SESSION["role_user"] == "Administrateur")
                header("Location:../BackViews/utilisateurs.php") ;
            else
            {*/

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
                        echo "<div style='margin-top: 7.5%;'></div>";
                        echo "<center><h1>Votre compte a bien été activé !</h1></center>";
                        echo '<a id="login" class="input" href="logout.php" style = "position:relative; margin-left:550px;"> Connexion </a>';
                        echo "<div style='margin-top: 7.5%;'></div>";
                    }else{
                        echo "<div style='margin-top: 7.5%;'></div>";
                        echo "<center><h1>Les clés de confirmation ne correspondent pas !</h1></center>";
                        echo '<a id="login" class="input" href="logout.php"> Exit </a>';
                        echo "<div style='margin-top: 7.5%;'></div>";
                        }
                    }else{
                    echo "<div style='margin-top: 7.5%;'></div>";
                    echo "<center><h1>Votre compte a déjà été activé !</h1></center>";
                    echo '<a id="login" class="input" href="logout.php" style = "position:relative; margin-left:550px;"> Connexion </a>';
                    echo "<div style='margin-top: 7.5%;'></div>";
                }
            }
        } 
    //}
//}
    ob_end_flush();
?>
<!-- Footer -->
<footer>
		<h1>Nos services</h1>

		<p>Découvrez nos services en ligne complets .</p>
		<br>

		<div class="service">
			<h3>Paiement en ligne</h3>
			<p>Découvrez les méthodes facile de Paiement en ligne ( paiment banquaire ).</p>
		</div>


		</div>

		<p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram: AIM | Gmail: AIM.ESPRIT@gmail.com |
			&copy; 2021, AIM.</p>
	</footer>
</body>
</html>