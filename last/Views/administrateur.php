<?php 
    if(!isset($_SESSION)){
        session_start();
    }
	if (isset($_SESSION["username"]))
	{
        if ($_SESSION['confirme'] == 1)
	    {
            if ($_SESSION["role_user"] == "Utilisateur")
                header("location:login.php") ; 
            else if ($_SESSION["role_user"] == "Administrateur"){

                $id_user = "";
                $nom_user = "" ;
                $prenom_user = ""; 
                $email_user = "";
                $tel_user = "";
                $adresse_user = "" ;
                $username = "" ;
                $password_user = "" ;
                $role_user = "" ;
                $verifpassword_user = "";
                $confirmation_key = "";
                $confirme = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrateur</title>
    <style>
        .btn{
        text-decoration: none;
        border: 2px solid black;
        font-size: 20px;
        color: black;
        background-color: lightgray;
        padding: 8px 80px; 
        position: relative;
        margin-left: 80%;
        }

		.table {
			border:1px solid black;
			border-collapse:collapse;
			color : black ;
			font-weight: bold ;
			text-align: center ;   
			width : 130px;
		}
		.bouton {
			border:1px solid black;
			border-collapse:collapse;
			color : black ;
			font-weight: bold ;
			text-align: center ;   
			width : 170px;
			height : 30px ;
		}
		.input {
			border:1px solid black;
			border-collapse:collapse;
			color : black ;
			width : 160px;
			height : 26px ;
		}
    </style>
</head>
<body>
    <h1>Partie Administrateur</h1>
    <a id="logout" class="btn" href="logout.php"> Déconnexion </a>
    <br><br><br>
    <a style = "padding: 8px 56px;" id="desactiver" class="btn" href="desactiver_compte.php?username=<?php echo $_SESSION['username']?>"> Désactiver Compte </a>   
    
    <?php
	// ================= Rechercher Un Utilisateur ==================================
		include '../config.php' ; 
		include 'rechercherUtilisateur.php' ;

	// ==================== REINITIALISER ==========================
		if (isset($_REQUEST['reinitialiser']))
		{
			$id_user = "";
			$nom_user = "" ;
			$prenom_user = ""; 
			$email_user = "";
			$tel_user = "";
			$adresse_user = "" ;
			$username = "" ;
			$password_user = "" ;
			$role_user = "" ;
		}
	?>

<table>
		<td>
			<form action="" method="POST">
			<table>
			<!-- =================== ATTRIBUTS & BOUTONS =================== -->
				<tr>
					<th>ID : </th>
					<th><input class = "input" type="text" name="id_user" value="<?php echo $id_user ; ?>"></th>
				</tr>
				<tr>
					<th>Nom  : </td>
					<th><input class = "input" type="text" name="nom_user" value="<?php echo $nom_user ; ?>"></th>
				</tr>
				<tr>
					<th>Prénom : </td>
					<th><input class = "input" type="text" name="prenom_user" value="<?php echo $prenom_user ; ?>"></th>
				</tr>
				<tr>
					<th>Email : </th>
					<th><input class = "input" type="text" name="email_user" value="<?php echo $email_user ; ?>"></th>
				</tr>
				<tr>
					<th>Téléphone : </th>
					<th><input class = "input" type="number" name="tel_user" value="<?php echo $tel_user ; ?>"></th>
				</tr>
				<tr>
					<th>Adresse : </th>
					<th><input class = "input" type="text" name="adresse_user" value="<?php echo $adresse_user ; ?>"></th>
				</tr>
				<tr>
					<th>Username : </th>
					<th><input class = "input" type="text" name="username" value="<?php echo $username ; ?>"></th>
				</tr>
				<tr>
					<th>Mot de passe : </th>
					<th><input class = "input" type="password" name="password_user" value="<?php echo $password_user ; ?>"></th>
				</tr>
				<tr>
					<th>Confirmer mot de passe : </th>
					<th><input class = "input" type="password" name="verifpassword_user" value="<?php echo $verifpassword_user ; ?>"></th>
				</tr>
				<tr>
					<th>Rôle : </th>
					<th>
						<select style="width: 167px;" class="input" id="role_user" name = "role_user">
								<option <?=$role_user=='Administrateur'?'selected="selected"':'';?> value="Administrateur">Administrateur</option>
								<option <?=$role_user=='Utilisateur'?'selected="selected"':'';?> value="Utilisateur">Utilisateur</option>
						</select>
					</th>
				</tr>
				<tr>
					<th><input class = "input" type="hidden" name="confirme" value="<?php echo $confirme ; ?>"></th>
					<th><input class = "input" type="hidden" name="confirmation_key" value="<?php echo $confirmation_key ; ?>"></th>
				</tr>
				</table>

			<table>
				<br>
				<tr>
					<th>
						<select value="sortselect" name="sortselect" style="width: 117px; height: 30px;">
							<option value="tri_id">ID</option>
							<option value="tri_nom" >Nom</option>
							<option value="tri_username" >Username</option>
						</select>
						<input type="submit" style="height : 30px; width:45px;" name="trier_utilisateurs" value="Trier">
					</th>
				</tr>
				<tr>
					<th><input class = "bouton" type="submit" name="signup" value="Ajouter Utilisateur"></th>
					<th><input class = "bouton" type="submit" name="modifier_utilisateur" value="Modifier Utilisateur"></th>
					<th><input class = "bouton" type="submit" name="supprimer_utilisateur" value="Supprimer Utilisateur"></th>
					<th><input class = "bouton" type="submit" name="rechercher_utilisateur" value="Rechercher Utilisateur"></th>
					<th><input class = "bouton"type="submit" name="reinitialiser" value="Réinitialiser" ></th>
				</tr>
				<?php	
					include_once '../config.php' ; 
					include 'ajouterUtilisateur.php' ;
					include 'modifierUtilisateur.php' ;
					include 'supprimerUtilisateur.php' ;
					include 'afficherUtilisateur.php' ;		
				?>
			</table>
			</form>
		</td>
	</table>

</body>
</html>
<?php 
        } 
    }else{
            echo "Votre compte n'a pas encore été confirmé ou a été désactivé, veuillez vérifiez vos mails !";
            header("location:logout.php") ; 
        } 
    }else 
        header("location:login.php") ; 
?>



