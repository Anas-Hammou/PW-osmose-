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
		include_once "../controller/UtilisateurC.php";
		include_once '../Model/Utilisateur.php';

		$username = ""; 
		$password_user =""; 
		$verifpassword_user = ""; 

		$code_verification = "";
		$codemsg = "";
        $error ="";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mot de passe Oublié</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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

<body class="bg-gradient-primary">
    <br><br><br>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Mot de passe Oublié ?</h1>
                                        <div style="height: 60px;"></div>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Entrez votre nom d'utilisateur ..." name="username" oninput="ValidateUsernameUser();">
                                        </div>
                                        <input type="hidden" id="UsernameUser_error" name="UsernameUser_error" value ="0"/>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="password_user" placeholder="Nouveau mot de passe" name = "password_user" oninput="ValidateMDPUser();">
                                            </div>
                                            <input type="hidden" id="MDPUser_error" name="MDPUser_error" value ="0"/>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="verifpassword_user" placeholder="Confirmer nouveau mot de passe" name = "verifpassword_user" oninput="ValidateMDPUser2();">
                                            </div>
                                            <input type="hidden" id="MDPUser_error_2" name="MDPUser_error_2" value ="0"/>
                                        </div>
                                        <input type="submit" name="restaurer" id="restaurer" onclick ="ValidateAll();" value="Restaurer Mot de passe" class="btn btn-primary btn-user btn-block">
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
                                                            $headers = 'From: testutilisateurs1@gmail.com' . "\r\n" . 
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
                                                            <br><hr>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-user"
                                                                    id="exampleInputUsername" aria-describedby="emailHelp"
                                                                    placeholder="Code de vérification reçu par mail ..." name="code_verification" 
                                                                    value=<?php echo $code_verification ?>>
                                                            </div>
                                                            <input type="hidden" name="codemsg" value="<?php echo $codemsg ?>">
                                                            <input type="hidden" name="username_2" value="<?php echo $username ?>">
                                                            <input type="hidden" name="password_user_2" value="<?php echo $password_user ?>">
                                                            <input class = "btn btn-primary btn-user btn-block" type="submit" name="valider" value="Valider" formaction="Restaurermdp.php">

                                                            </center>
                                                            <?php
                                                        }else 
                                                            echo "Les mots de passes sont différents !";
                                                    } 
                                                }
                                            }
                                        }
                                         ?>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Pas de compte ? Inscrivez-vous ici !</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Déja membre ? Connectez-vous ici !</a>
                                    </div>
                                    <hr>
                                    <p id="erreur" name = "error" style="color:red; font-weight:bold; font-size:14px; text-align:center; "><?php echo $error ?></p>
                                </div>
                            </div>
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