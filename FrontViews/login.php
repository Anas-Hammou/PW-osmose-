<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["role_user"] == "Administrateur")
			header("location:../BackViews/index.php") ; 
		else if ($_SESSION["role_user"] == "Utilisateur")
		header("location:front.php") ; 
	}else{
		$con = mysqli_connect('localhost','root') ; 
		mysqli_select_db($con,'osmose') ;
		$username = "" ; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	<!-- Tache LOGIN -->
	<center>
		<form action="" method="POST" style=" border: 1px solid black ; width : 20%;  padding-bottom: 30px; padding-top: 20px ;    ">
			<label>Nom d'utilisateur</label>
			<br>
				<input class = "input_U" type="text" name="username">
			<br><br>
			<label>Mot de passe</label>
			<br>
			<input class = "input_U" type="password" name="password_user"> 
			<br>
			<br>
			<input class="input" type="submit" name="login" value="Login">
			<br>
			<br>
			<p style="text-align: center;">Pas de compte ? <a class="hover_link" href="signup.php">Inscrivez-vous</a> ici.</p>
			<p style="text-align: center;">Mot de passe oublié ? <a class="hover_link"  href="mdpOublie.php"> Cliquez ici.</a>
		</form>	
		<?php
			if (isset($_POST['login'])) 
			{
				if (isset($_POST["username"]) && 
					isset($_POST["password_user"]) 
				) {
					if (
						!empty($_POST["username"]) && 
						!empty($_POST["password_user"]) 
					){
						$username = $_POST["username"] ; 
						$password = $_POST["password_user"] ; 
				
						$req = "select * from utilisateurs where username='$username' and password_user='$password'" ; 
						$result = $con->query($req) ; 
				
						if ($result->num_rows>0) 
						{
							$_SESSION['username'] = $username ;
							while ($row = $result->fetch_assoc()) 
							{
								$_SESSION['nom_prenom_user'] = $row['nom_user'] ." " .$row['prenom_user'];
								$_SESSION['email_user'] = $row['email_user'];
								$_SESSION['tel_user'] = $row['tel_user'];
								$_SESSION['id_user'] = $row['id_user'] ;
								$_SESSION['username'] = $row['username'] ;
								$_SESSION['role_user'] = $row['role_user'];
								$_SESSION['confirme'] = $row['confirme'];
								$_SESSION["modifier_1"] = 0;
								$_SESSION["modifier_2"] = 0;
							}
							if($_SESSION['confirme'] == 1){
								if ($_SESSION["role_user"] == "Administrateur")
									header("location:../BackViews/index.php") ; 
								else if ($_SESSION["role_user"] == "Utilisateur")
									header("location:front.php") ; 
								die ; 
							}else{
								echo '<p style="color:red; font-weight:bold; font-size:14px; text-align:center; ">Votre compte n\'a pas été activé, veuillez vérifier vos mails !</p>';
							}
						}else{
							echo '<p style="color:red; font-weight:bold; font-size:14px; text-align:center; ">Votre nom d\'utilisateur ou votre mot de passe est incorrect !</p>';
						}
					}else {
						echo '<p style="color:red; font-weight:bold; font-size:14px; text-align:center; ">Veuillez remplir tous les champs correctement.</p>' ; 
					}
				}
			}
		}
		?>
	</center>
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