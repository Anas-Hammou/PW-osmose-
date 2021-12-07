<?php
	ob_start();
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["role_user"] == "Administrateur")
			header("location:../BackViews/index.php") ; 
		else if ($_SESSION["role_user"] == "Utilisateur")
			header("Location:front.php") ;
	}else
	{
		$error = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="article.css">
	 <style type="text/css">
	 	.labels {
			font-family: 'Montserrat', sans-serif;
	 		color : black ;
	 	}
		table{
			background-color: white;
			padding: 2% ;
			border: 1px solid rgb(67, 67, 67);
			border-radius: 10px;
		}
		tr, td{
			background-color: white;
			border:none;
		}
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

		function ValidateRoleUser(){
			var role = document.getElementById("role_user"); 
			var error = document.getElementById("RoleUser_error");
			if (status.options != ""){
				error.value= 0;
			}else 
				error.value= 1;
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

		function ValidateAll(){
            ValidateNomUser();
            ValidatePrenomUser();
            ValidateEmailUser();
            ValidateTelUser();
            ValidateAdresseUser();
            ValidateUsernameUser();
            ValidateRoleUser();
			ValidateMDPUser();
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
			<a href="signup.php" >Sign up</a>
			<a href="login.php" >Log in</a>
		</div>
	</nav>
	<br><br>
	<!--  Sign Up form   -->
	<center>
	<table>
		<form action="" method="POST" style=" border: 1px solid black; width : 20%;  padding-bottom: 30px; padding-top: 20px ;    ">
			<tr>
				<td><label class="labels">Nom d'utilisateur : </label></td>
				<td><input class = "input_U" type="text" name="username" id="username" oninput="ValidateUsernameUser();"></td>
				<td><input type="hidden" id="UsernameUser_error" name="UsernameUser_error" value ="0"/></td>
			</tr>
			
			<tr>
				<td><label class="labels">Nom : </label></td>
				<td><input class = "input_U" type="text" name="nom_user" id="nom_user" oninput="ValidateNomUser();"></td>
				<td><input type="hidden" id="NomUser_error" name="NomUser_error" value ="0"/></td>
			</tr>

			<tr>
				<td><label class="labels">Prénom : </label></td>
				<td><input class = "input_U" type="text" name="prenom_user" id="prenom_user" oninput="ValidatePrenomUser();"></td>
				<td><input type="hidden" id="PrenomUser_error" name="PrenomUser_error" value ="0"/></td>
			</tr>

			<tr>
				<td><label class="labels">Email : </label></td>
				<td><input class = "input_U" type="text" name="email_user" id="email_user" oninput="ValidateEmailUser();"></td>
				<td><input type="hidden" id="EmailUser_error" name="EmailUser_error" value ="0"/></td>
			</tr>
			
			<tr>
				<td><label class="labels">Téléphone : </label></td>
				<td><input class = "input_U" type="number" name="tel_user" id="tel_user" onblur="ValidateTelUser();"></td>
				<td><input type="hidden" id="TelUser_error" name="TelUser_error" value ="0"/></td>
			</tr>
			 
			<tr>
				<td><label class="labels">Adresse : </label></td>
				<td><input class = "input_U" type="text" name="adresse_user" id="adresse_user" oninput="ValidateAdresseUser();"></td>
				<td><input type="hidden" id="AdresseUser_error" name="AdresseUser_error" value ="0"/></td>
			</tr>

			<tr>
				<td><label class="labels">Mot de passe : </label></td>
				<td><input class = "input_U" type="password" name="password_user" id="password_user" oninput="ValidateMDPUser();"></td>
				<td><input type="hidden" id="MDPUser_error" name="MDPUser_error" value ="0"/></td>
			</tr>
			<tr>
				<td><label class="labels">Confirmer mot de passe : </label></td>
				<td><input class = "input_U" type="password" name="verifpassword_user"></td>
			</tr>

			<tr>
				<td><label class="labels">Type du compte : </label></td>
				<td><input class = "input_U"  type="text" name = "role_user" value="Utilisateur" readonly></td>
				<td><input type="hidden" id="RoleUser_error" name="RoleUser_error" value ="0"/></td>
			</tr>
			
			<tr style="height: 30px !important;">
            	<td colspan="2">&nbsp;</td>
       	 	</tr>
			<tr>
				<td colspan="2" style="border:none; padding-left:150px;">
				   	<input class="input" type="submit" name="signup" id="signup" onclick ="ValidateAll();" value="Sign Up">
				</td>
			</tr>
			<tr>
				<td colspan="2" style="border:none; text-align: center;">
					<p style="color: black;">Déjà Membre ? <a class="hover_link" href="login.php"> Connectez-vous ici.</a></p>
				</td>
			</tr>
			<?php	
				include_once '../config.php' ; 
				include 'ajouterUtilisateur.php' ;
			?>
			</form>	
	</table>
	<div style="width: 450px;">
		<p id="erreur" name = "error" style="color:red; font-weight:bold; font-size:14px; text-align:center; "><?php echo $error ?></p>
	</div>
	</center>
	<?php }
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