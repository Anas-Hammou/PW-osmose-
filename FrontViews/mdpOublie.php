<?php 
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_SESSION["username"]))
	{
		header('Location:front.php');
	}else
	{
		include_once "../controller/UtilisateurC.php";
		include_once '../Model/Utilisateur.php';

		$username = ""; 
		$password_user =""; 
		$verifpassword_user = ""; 

		$code_verification = "";
		$codemsg = "";
		$error = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurer Mot de passe</title>
	<link rel="stylesheet" href="article.css">
	<style>
		.input{
			font-family: 'Montserrat', sans-serif;
			font-weight: bold;
			padding: 5px;
			width: 100px;
			border-radius: 5%;
			background-color: aliceblue;
		}
		.input:hover{
			font-family: 'Montserrat', sans-serif;
			font-weight: bold;
			padding: 5px;
			width: 100px;
			border-radius: 5%;
			background-color: #f7c2f9;
		}
		.input_U{
			font-family: 'Montserrat', sans-serif;
			font-weight: bold;
			padding: 5px;
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
	</style>
	<script>
        function ValidateUsernameUser(){
        var username = document.getElementById("username").value; 
        var error = document.getElementById("UsernameUser_error");

        if (username == ""){
            error.value= 1;
        }
        else 
        {
            error.value= 0;
        }
    }

    function ValidateMDPUser(){
			var mdp = document.getElementById("password_user").value ; 
            var error = document.getElementById("MDPUser_error");
            if (mdp == "")
            {
                error.value= 1;
            }else if (mdp.length > 8)
            {
                error.value= 0;
            }else{
                error.value= 2;
            }
		}

        function ValidateMDPUser2(){
			var verif = document.getElementById("verifpassword_user").value ; 
            var mdp = document.getElementById("password_user").value ; 
            var error = document.getElementById("MDPUser_error_2");
            if (mdp == "")
            {
                error.value= 1;
            }else if (verif == mdp)
            {
                error.value= 0;
            }else if (verif != mdp){
                error.value= 2;
            }
		}

		function ValidateAll(){
            ValidateUsernameUser();
            ValidateMDPUser();
            ValidateMDPUser2();
        }
    </script>

</head>
<body>
	<!-- Header --> 
	<nav>
        <?php 
            if (isset($_SESSION["username"]))
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="articlee.php" onclick=window.location.href='articlee.php'>article</a>
                    <a href="" onclick=window.location.href=''>formation</a>
                    <a href="" onclick=window.location.href=''>evenement</a>
                    <a href="" onclick=window.location.href=''>reclamation</a>
                    <a href="#contact">Contact</a>
                    <a href="compteUtilisateur.php">Mon compte</a>
                </div> 
           <?php }else
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="articlee.php" onclick=window.location.href='articlee.php'>article</a>
                    <a href="" onclick=window.location.href=''>formation</a>
                    <a href="" onclick=window.location.href=''>evenement</a>
                    <a href="#contact">Contact</a>
                    <a href="signup.php" onclick=window.location.href='signup.php'>Sign up</a>
                    <a href="login.php" onclick=window.location.href='login.php'>Log in</a>
                </div>
        <?php } ?>
    </nav>
	<br><br>
	<!-- Tache LOGIN : Mot de passe oublié -->
	<center>
		<form action="" method="POST" style=" border: 1px solid black ; width : 20%;  padding-bottom: 30px; padding-top: 20px ;    ">
			<label>Nom d'Utilisateur</label>
			<br>
			<input class = "input_U" type="text" name="username" id="username" oninput="ValidateUsernameUser();" value = <?php echo $username ?>>
			<input type="hidden" id="UsernameUser_error" name="UsernameUser_error" value ="0"/>
			<br><br>
			<label>Nouveau mot de passe</label>
			<br>
			<input class = "input_U" type="password" name="password_user" id="password_user" oninput="ValidateMDPUser();" value = <?php echo $password_user ?>> 
			<input type="hidden" id="MDPUser_error" name="MDPUser_error" value ="0"/>
			<br><br>
            <label>Confirmer mot de passe</label>
            <input class = "input_U" type="password" name="verifpassword_user" id="verifpassword_user" oninput="ValidateMDPUser2();" value = <?php echo $verifpassword_user ?>> 
			<input type="hidden" id="MDPUser_error_2" name="MDPUser_error_2" value ="0"/>
			<br><br>
			<input class = "input" type="submit" name="restaurer" id="restaurer" onclick ="ValidateAll();" value="Restaurer">
		<!-- </form>	 -->
	<!-- </center> -->
    <br><br>
	
    <?php 
		if (isset($_POST['restaurer']))
		{
			$UsernameUser_error = $_POST['UsernameUser_error']; 
			$MDPUser_error = $_POST['MDPUser_error']; 
			$MDPUser_error_2 = $_POST['MDPUser_error_2']; 

			if(!(($UsernameUser_error == 0) &&
				($MDPUser_error == 0) &&
				($MDPUser_error_2 == 0)))
			{
				$error = "Veuillez remplir ces champs correctement : ";
				if ($UsernameUser_error == 1)
				{
					$error = $error ."Nom d'utilisateur / "; 
				}
				if ($MDPUser_error == 1)
				{
					$error = $error ."Mot de passe / "; 
				}else if ($MDPUser_error == 2)
				{
					$error = $error ."Mot de passe (8 caractères) / "; 
				}
				if ($MDPUser_error_2 == 1)
				{
					$error = $error ."Confirmation du mot de passe "; 
				}else if ($MDPUser_error_2 == 2)
				{
					$error = $error ."Les mots de passe ne sont pas identiques "; 
				}
			}else
			{
				$error = "";
			if (
				isset($_POST["username"])&&
				isset($_POST["password_user"]) && 
				isset($_POST["verifpassword_user"]) 
			) {
				if (
					!empty($_POST["username"]) && 
					!empty($_POST["password_user"]) && 
					!empty($_POST["verifpassword_user"]) 
				){
					$password_user = $_POST['password_user']; 
					$verifpassword_user = $_POST['verifpassword_user'];
					if ($password_user == $verifpassword_user)
					{
						$utilisateurC = new UtilisateurC();
						$username = $_POST['username'];
						$utilisateur = $utilisateurC->rechercher_UtilisateurUsername($username);
	
						$id_user = $utilisateur['id_user'] ; 
						$nom_user = $utilisateur['nom_user'] ; 
						$prenom_user = $utilisateur['prenom_user'] ; 
						$email_user = $utilisateur['email_user'] ; 
						$tel_user = $utilisateur['tel_user'] ;  
						$adresse_user = $utilisateur['adresse_user'] ; 
						$role_user = $utilisateur['role_user'] ;  
	
						// Code de vérification à envoyer par mail 
						$codemsg = "";
						for ($i = 0; $i<9; $i++){
							if($i == 3 || $i == 6)
								$codemsg = $codemsg.' ' ;
							$codemsg = $codemsg.chr(rand(65,90));
						}
	
						// Partie Mailing 
						$headers = 'From: aimteam.services@gmail.com' . "\r\n" . 
									'MIME-Version: 1.0' . "\r\n" .
									'Content-Type: text/html; charset=utf-8';
	
						$message = "Bonjour " .$username .",<br><br> Voici le code de vérification que vous
									devrez saisir pour changer le mot de passe de votre compte : " .$codemsg ."<br><br> Cordialement.";
	
						$result = mail($email_user, 
										"Restauration Mot de passe", 
										$message, 
										$headers);

						// HTML CODE DE VERIFICATION  
						?>
						<label>Code de vérification </label>
						<br>
						<input class = "input_U" type="text" name="code_verification" value=<?php echo $code_verification ?> >
						<input type="hidden" name="codemsg" value="<?php echo $codemsg ?>">
						<input type="hidden" name="username_2" value="<?php echo $username ?>">
						<input type="hidden" name="password_user_2" value="<?php echo $password_user ?>">
						<br><br>
						<input class = "input" type="submit" name="valider" value="Valider" formaction="Restaurermdp.php">
						</center>
						<?php
					}else 
						echo "Les mots de passes sont différents !";
					} 
				}
			}
		}
	}
	?>
	<p style="text-align: center;">Déjà membre ? <a class="hover_link"  href="login.php"> Cliquez ici.</a>
	<p style="text-align: center;">Pas de compte ? <a class="hover_link" href="signup.php">Inscrivez-vous</a> ici.</p>
	<p id="erreur" name = "error" style="color:red; font-weight:bold; font-size:14px; text-align:center; "><?php echo $error ?></p>
	</form>
</div>
<?  
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