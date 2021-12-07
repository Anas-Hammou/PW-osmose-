<?php 
ob_start();
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION["username"]))
{
    header('Location:login.php');
}else
{
    if ($_SESSION["role_user"] == "Administrateur")
        header("Location:../BackViews/compteAdministrateur.php") ;
    else
    {
        include_once '../Model/Utilisateur.php';
        include_once '../Controller/UtilisateurC.php';

        $utilisateurC = new UtilisateurC();
        $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($_SESSION['username']);

        $id_user = $utilisateur['id_user'] ; 
        $nom_user = $utilisateur['nom_user'] ; 
        $prenom_user = $utilisateur['prenom_user'] ; 
        $email_user = $utilisateur['email_user'] ; 
        $tel_user = $utilisateur['tel_user'] ;  
        $adresse_user = $utilisateur['adresse_user'] ; 
        $username = $utilisateur['username'] ; 
        $password_user = $utilisateur['password_user'] ; 
        $role_user = $utilisateur['role_user'] ;  
        $confirmation_key = $utilisateur['confirmation_key'] ;  
        $confirme = $utilisateur['confirme'] ;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="article.css">
    <style>
        .labels {
			font-family: 'Montserrat', sans-serif;
	 		color : black ;
	 	}
		table{
			background-color: white;
			padding: 2% ;
			border:none;
			border-radius: 10px;
            position: relative;
            margin-left: 30px;
            border-spacing: 15px 1px;
		}
		tr, td{
			background-color: white;
			border:none;
            color: black;
		}
		.input{
			font-family: 'Montserrat', sans-serif;
			font-weight: bold;
            font-size: 15px;
			padding: 8px 18px;
			width: 110px;
			background-color: aliceblue;
            border: 2px solid black;
            border-radius: 5%;
		}
		.input:hover{
			font-family: 'Montserrat', sans-serif;
			font-weight: bold;
			padding: 8px 18px;
			width: 110px;
			border-radius: 5%;
			background-color: #f7c2f9;
		}
		.input_U{
			font-family: 'Montserrat', sans-serif;
			padding: 5px;
            width: 250px;
		}

		.hover_link{
			font-family: 'Montserrat', sans-serif;
			color:#7b38d8;
			font-weight: bold;
		}
		.hover_link:hover{
			font-family: 'Montserrat', sans-serif;
			color:#f7c2f9;
			font-weight: bold;
		}
        h2, h3{
            position: relative; 
            margin-left: 2%
        }
    </style>
    <script>
        function ValidateNomUser(){
			var nom = document.getElementById("nom_user").value; 
			var error = document.getElementById("NomUser_error");

            var pattern = /^[a-zA-Z\s]+$/;
			if (nom == ""){
				error.value= 1;
			}
			if (nom.match(pattern)){
				error.value= 0;
			}else 
			{
				error.value= 2;
			}
		}

        function ValidatePrenomUser(){
			var prenom = document.getElementById("prenom_user").value; 
			var error = document.getElementById("PrenomUser_error");

			var pattern = /^[a-zA-Z\s]+$/;
			if (prenom == ""){
				error.value= 1;
			}
			if (prenom.match(pattern)){
				error.value= 0;
			}else 
			{
				error.value= 2;
			}
		}

        function ValidateEmailUser()
        {
            var mail = document.getElementById("email_user").value ; 
            var error = document.getElementById("EmailUser_error");
            if (mail == "")
            {
                error.value= 1;
            }else{
                var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/
                if (mail.match(pattern)){
                    error.value= 0;
                }else{
                    error.value= 2;
                }
            }
        }

        function ValidateTelUser()
        {
            var tel = document.getElementById("tel_user").value ; 
            var error = document.getElementById("TelUser_error");
            if (tel == "")
            {
                error.value= 1;
            }else if (tel.length == 8)
            {
                error.value= 0;
            }else{
                error.value= 2;
            }
        }

        function ValidateAdresseUser(){
			var adresse = document.getElementById("adresse_user").value; 
			var error = document.getElementById("AdresseUser_error");

			if (adresse == ""){
				error.value= 1;
			}
			else 
			{
				error.value= 0;
			}
		}

		function ValidateAll1(){
            ValidateNomUser();
            ValidatePrenomUser();
            ValidateEmailUser();
            ValidateTelUser();
            ValidateAdresseUser();
		}
	</script>
</head>
<body>
    <!-- Header -->
	<nav>
		<h1>AIM</h1>
		<div class="onglets">
			<a href="#" onclick=window.location.href='front.php'>Home</a>
			<a href="#">Article</a>
			<a href="#">Categorie</a>
			<a href="#contact">Contact</a>
            <a href="compteUtilisateur.php">Mon compte</a>
			<!-- <a href="signup.php" >Sign up</a>
			<a href="login.php" >Log in</a> -->
		</div>
	</nav>
	<br>
	<!-- Partie Compte Utilisateur -->
    <h1 style="position:relative; margin-left:15%;">Profil</h1>
    <div style="border:1px solid black; position:relative; margin-left:20%; width:60%; height: 700px; box-shadow: 10px 10px #f7c2f9;">
        <h2>Informations sur le compte :</h2>
        <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <h5>Nom</h5>
                </td>
                <td>
                    <input name = "nom_user" id = "nom_user" class="input_U" type="text" oninput="ValidateNomUser();" value="<?php echo $nom_user ?>">
                </td>
                <td><input type="hidden" id="NomUser_error" name="NomUser_error" value ="0"/></td>
            </tr>
            <tr>
                <td>
                    <h5>Prénom</h5>
                </td>
                <td>
                    <input name = "prenom_user" id = "prenom_user" class="input_U" type="text" oninput="ValidatePrenomUser();" value="<?php echo $prenom_user ?>">
                </td>
                <td><input type="hidden" id="PrenomUser_error" name="PrenomUser_error" value ="0"/></td>
            </tr>
            <tr>
                <td>
                    <h5>Nom d'utilisateur</h5>
                </td>
                <td>
                    <input name = "username" class="input_U" type="text" value="<?php echo $username; ?>" readonly>
                    <p style="font-size: 9px; color:gray; position:relative; margin-top:1px;">*Cette donnée ne peut pas être modifiée.</p>

                </td>
            </tr>
            <tr>
                <td>
                    <h5>Adresse e-mail</h5>
                </td>
                <td>
                    <input name = "email_user" id = "email_user" class="input_U" type="text" oninput="ValidateEmailUser();" value="<?php echo $email_user; ?>">
                </td>
                <td><input type="hidden" id="EmailUser_error" name="EmailUser_error" value ="0"/></td>
            </tr>
            <tr>
                <td>
                    <h5>Numéro de téléphone</h5>
                </td>
                <td>
                    <input name = "tel_user" id = "tel_user" class="input_U" type="text" onblur="ValidateTelUser();" value="<?php echo $tel_user; ?>">
                </td>
                <td><input type="hidden" id="TelUser_error" name="TelUser_error" value ="0"/></td>
            </tr>
            <tr>
                <td>
                    <h5>Adresse</h5>
                </td>
                <td>
                    <input name = "adresse_user" id = "adresse_user" class="input_U" type="text" oninput="ValidateAdresseUser();" value="<?php echo $adresse_user; ?>">
                </td>
                <td><input type="hidden" id="AdresseUser_error" name="AdresseUser_error" value ="0"/></td>
            </tr>
            <tr>
                <td>
                    <h5>Type du compte</h5>
                </td>
                <td>
                    <input name = "role_user" class="input_U" type="text" value="<?php echo $role_user; ?>" readonly>
                    <p style="font-size: 9px; color:gray; position:relative; margin-top:1px;">*Cette donnée ne peut pas être modifiée.</p>
                </td>
            </tr>
            <tr><td><input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>" readonly></td></tr>
        </table>
        <input class="input" style = "margin-left:85%;" type="submit" name="modifier_utilisateur_2" onclick ="ValidateAll1();" value="Modifier" formaction="modifierUtilisateur.php">
        </form>
        <?php
            if (!(is_numeric($_SESSION['modifier_1']))) { ?>
                <p id="erreur1" name = "error1" style="color:red; font-weight:bold; font-size:14px; position:relative; 
                margin-left:15px;"><?php echo $_SESSION["modifier_1"]; ?></p>
            <?php $_SESSION['modifier_1'] = 0; 
                }else if ($_SESSION['modifier_1'] == 1){ ?>
                <p id="succes1" name = "succes1" style="color:green; font-weight:bold; font-size:14px; position:relative; 
                margin-left:15px;">Votre compte a été modifié avec succès !</p>
            <?php $_SESSION['modifier_1'] = 0 ; 
            } ?>
    </div>
    <br><br>
    <div style="border:1px solid black; position:relative; margin-left:20%; width:60%; height:450px; box-shadow: 10px 10px #f7c2f9;">
        <h2>Changer de mot de passe :</h2>
        <form action="" method="POST">
        <table>
            <input name = "username" class="input_U" type="hidden" value="<?php echo $username; ?>">
            <tr>
                <td>
                    <h5>Ancien mot de passe</h5>
                </td>
                <td>
                    <input name = "ancien_mdp" class="input_U" type="password" placeholder="Ancien mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <h5>Nouveau mot de passe</h5>
                </td>
                <td>
                    <input name = "nouveau_mdp" class="input_U" type="password" placeholder="Nouveau mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <h5>Confirmer mot de passe</h5>
                </td>
                <td>
                    <input name = "confirmer_nv_mdp" class="input_U" type="password" placeholder="Nouveau mot de passe">
                </td>
            </tr>
        </table>
        <input class="input" style = "margin-left:85%;" type="submit" name="modifier_utilisateur_3" value="Modifier" formaction="modifierUtilisateur.php">
        </form>
        <?php
            if (!(is_numeric($_SESSION['modifier_2']))) { ?>
                <p id="erreur2" name = "error2" style="color:red; font-weight:bold; font-size:14px; position:relative; 
                margin-left:15px;"><?php echo $_SESSION["modifier_2"]; ?></p>
            <?php $_SESSION['modifier_2'] = 0; 
                }else if ($_SESSION['modifier_2'] == 1){ ?>
                <p id="succes2" name = "succes2" style="color:green; font-weight:bold; font-size:14px; position:relative; 
                margin-left:15px;">Votre mot de passe a été modifié avec succès !</p>
            <?php $_SESSION['modifier_2'] = 0 ; 
        } ?>
    </div>
    <br><br>
    <table>
        <tr>
            <td>
                <a id="logout" class="input" style= "text-decoration:none; color:black;" href="logout.php"> Déconnexion </a>
            </td>
        </tr>
        <tr style="height: 30px !important;">
            	<td colspan="2">&nbsp;</td>
       	 	</tr>
        <tr>
            <td>
               <a id="desactiver" class="input" style= "text-decoration:none; color:black;" href="desactiver_compte.php?username=<?php echo $_SESSION['username']?>"> Désactiver Compte </a>  
            </td>
        </tr>
    </table>
    <?php } 
        include_once 'modifierUtilisateur.php';
    }
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