<?php
ob_start();
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["role_user"] == "Administrateur")
			header("location:index.php") ; 
		else if ($_SESSION["role_user"] == "Utilisateur")
		    header("Location:../FrontViews/front.php") ;
	}else
	{
        $error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
            ValidateNomUser();
            ValidatePrenomUser();
            ValidateEmailUser();
            ValidateTelUser();
            ValidateAdresseUser();
            ValidateUsernameUser();
			ValidateMDPUser();
			ValidateMDPUser2();
		}
        </script>
</head>

<body class="bg-gradient-primary">
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créez votre compte !</h1>
                            </div>
                            <form action="" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nom_user"
                                            placeholder="Nom" name = "nom_user" oninput="ValidateNomUser();">
                                    </div>
                                    <input type="hidden" id="NomUser_error" name="NomUser_error" value ="0"/>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="prenom_user"
                                            placeholder="Prénom" name = "prenom_user" oninput="ValidatePrenomUser();">
                                    </div>
                                    <input type="hidden" id="PrenomUser_error" name="PrenomUser_error" value ="0"/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email_user"
                                        placeholder="Adresse e-mail" name = "email_user" oninput="ValidateEmailUser();">
                                </div>
                                <input type="hidden" id="EmailUser_error" name="EmailUser_error" value ="0"/>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="username"
                                            placeholder="Nom d'utilisateur" name = "username" oninput="ValidateUsernameUser();">
                                    </div>
                                    <input type="hidden" id="UsernameUser_error" name="UsernameUser_error" value ="0"/>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="tel_user"
                                            placeholder="Numéro de téléphone" name = "tel_user" onblur="ValidateTelUser();">
                                    </div>
                                    <input type="hidden" id="TelUser_error" name="TelUser_error" value ="0"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="adresse_user"
                                        placeholder="Adresse domicile" name = "adresse_user" oninput="ValidateAdresseUser();">
                                </div>
                                <input type="hidden" id="AdresseUser_error" name="AdresseUser_error" value ="0"/>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_user" placeholder="Mot de passe" name = "password_user" oninput="ValidateMDPUser();">
                                    </div>
                                    <input type="hidden" id="MDPUser_error" name="MDPUser_error" value ="0"/>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="verifpassword_user" placeholder="Confirmer mot de passe" name = "verifpassword_user" oninput="ValidateMDPUser2();">
                                    </div>
                                    <input type="hidden" id="MDPUser_error_2" name="MDPUser_error_2" value ="0"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="role_user"
                                        name = "role_user" value="Administrateur" readonly>
                                </div>
                                <input type="submit" name="signup" id="signup" onclick ="ValidateAll();" value="Sign Up" class="btn btn-primary btn-user btn-block">
                                <!-- <hr> -->
                                <!-- <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                                <?php 
                                    include_once '../config.php' ; 
                                    include 'ajouterUtilisateur.php' ;
                                ?>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="mdpOublie.php">Mot de passe oublié ?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Déjà membre ? Connectez-vous ici !</a>
                            </div>
                            <hr>
                            <p id="erreur" name = "error" style="color:red; font-weight:bold; font-size:14px; text-align:center; "><?php echo $error ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } 
        ob_end_flush();
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>