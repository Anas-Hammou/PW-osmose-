<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	 <style type="text/css">
	 	.labels {
	 		font-size: 15px ; 
	 		color : black ;
	 		font-weight : bold;
	 	}
	 </style>

</head>
<body>
	<!--  Sign Up form   -->
	
	<center>
	<table>
		<form action="" method="POST">
			<tr>
				<center><h1>Inscription</h1></center>
				
			</tr>
			<tr>
				<td><label class="labels">Username : </label></td>
				<td><input type="text" name="username"></td>
			</tr>
			
			<tr>
				<td><label class="labels">Nom : </label></td>
				<td><input type="text" name="nom_user"></td>
			</tr>

			<tr>
				<td><label class="labels">Prénom : </label></td>
				<td><input type="text" name="prenom_user"></td>
			</tr>

			<tr>
				<td><label class="labels">Email : </label></td>
				<td><input type="text" name="email_user"></td>
			</tr>
			
			<tr>
				<td><label class="labels">Téléphone : </label></td>
				<td><input type="number" name="tel_user"></td>
			</tr>
			 
			<tr>
				<td><label class="labels">Adresse : </label></td>
				<td><input type="text" name="adresse_user"></td>
			</tr>

			<tr>
				<td><label class="labels">Mot de passe : </label></td>
				<td><input type="password" name="password_user"></td>
			</tr>
			<tr>
				<td><label class="labels">Confirmer mot de passe : </label></td>
				<td><input type="password" name="verifpassword_user"></td>
			</tr>

			<tr>
				<td><label class="labels">Rôle : </label></td>
				<td>
					<select class="input" id="role_user" name = "role_user" style="width: 170px;">
						<option value="Administrateur">Administrateur</option>
						<option value="Utilisateur">Utilisateur</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><input type="submit" name="signup" value="Créer un compte"></td>
				<td class="labels">Déjà Membre ? <a href="login.php"> Connectez-vous ici.</a></td>
			</tr>
			<?php	
				include_once '../config.php' ; 
				include 'ajouterUtilisateur.php' ;
			?>
		</form>	
	</table>
	</center>
</body>
</html>