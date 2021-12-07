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
	}else{
		$con = mysqli_connect('localhost','root') ; 
		mysqli_select_db($con,'gestion_utilisateur') ;
		$username = "" ; 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <br><br><br><br>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Entrez votre nom d'utilisateur .." name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mot de passe" name="password_user">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <input type="submit" name="login" value="Login"  class="btn btn-primary btn-user btn-block">
                                        <!-- <hr>
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
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
                                                        if ($_SESSION["role_user"] == "Administrateur"){
                                                            header("location:index.php") ; 
                                                        }else if ($_SESSION["role_user"] == "Utilisateur"){
                                                            header("Location:../FrontViews/front.php") ;
                                                        }die ; 
                                                    }else{
                                                        echo "<p style='text-align:center;'> Votre compte n'a pas été activé, veuillez vérifier vos mails !</p>";
                                                    }
                                                }else{
                                                    echo "Votre nom d'utilisateur ou votre mot de passe est incorrect !";
                                                }
                                            }else {
                                                echo "Veuillez remplir tous les champs correctement." ; 
                                            }
                                        }
                                    } ?>
                                    <hr>
                                    <div class="text-center">
                                    <a class="small" href="mdpOublie.php">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Pas de compte ? Inscrivez-vous ici !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php 
            }
            ob_end_flush();
		?>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>