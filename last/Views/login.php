<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["role_user"] == "Administrateur")
			header("location:administrateur.php") ; 
		else if ($_SESSION["role_user"] == "Utilisateur")
		header("location:utilisateur.php") ; 
	}
	$con = mysqli_connect('localhost','root') ; 
	mysqli_select_db($con,'gestion_utilisateur') ;
	$username = "" ; 
	if (isset($_POST['login'])) 
	{
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
			}
			if($_SESSION['confirme'] == 1){
				if ($_SESSION["role_user"] == "Administrateur")
					header("location:administrateur.php") ; 
				else if ($_SESSION["role_user"] == "Utilisateur")
					header("location:utilisateur.php") ; 
				die ; 
			}else 
				echo "Votre compte n'a pas été activé, veuillez vérifiez vos mails !";
		} else {
			echo "Réessayez." ; 
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<form action="" method="POST" style=" border: 1px solid black ; width : 20%;  padding-bottom: 30px; padding-top: 20px ;    ">
			<label>Username</label>
			<br>
			<input type="text" name="username">
			<br>
			<label>Mot de passe</label>
			<br>
			<input type="password" name="password_user"> 
			<br>
			<br>
			<input type="submit" name="login" value="Se connecter">
			<br>
			<br>
			<p>Pas de compte ? <a href="signup.php">Inscrivez-vous</a> ici.</p>
		</form>	
	</center>
</body>
</html>