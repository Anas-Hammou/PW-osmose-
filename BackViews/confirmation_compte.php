<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation du compte</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div style="height: 200px;"></div>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" >
                    <!-- Tache confimation compte -->
                    <?php 
                        ob_start();
                        if(!isset($_SESSION)){
                            session_start();
                        }
                            if (isset($_SESSION["username"]))
                            {
                                if ($_SESSION["role_user"] == "Utilisateur")
                                    header("Location:../FrontViews/front.php") ;
                                else
                                {

                                    include_once '../Model/Utilisateur.php';
                                    include_once '../Controller/UtilisateurC.php';
                                    
                                    if (
                                        isset($_GET["username"]) &&
                                        isset($_GET["confirmation_key"])
                                    ) {
                                        if (
                                            !empty($_GET["username"]) && 
                                            !empty($_GET["confirmation_key"])
                                        ){
                                            $username = htmlspecialchars(urldecode($_GET['username'])); 
                                            $confirmation_key = $_GET['confirmation_key'];

                                            $utilisateurC = new UtilisateurC(); 
                                            $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($username); 

                                            $id_user = $utilisateur['id_user'] ; 
                                            $nom_user = $utilisateur['nom_user'] ; 
                                            $prenom_user = $utilisateur['prenom_user'] ; 
                                            $email_user = $utilisateur['email_user'] ; 
                                            $tel_user = $utilisateur['tel_user'] ;  
                                            $adresse_user = $utilisateur['adresse_user'] ; 
                                            $password_user = $utilisateur['password_user'] ; 
                                            $role_user = $utilisateur['role_user'] ;  
                                            $confirmation_key_bd = $utilisateur['confirmation_key'] ; 
                                            $confirme = $utilisateur['confirme'] ;

                                            if ($confirme == 0){
                                                if($confirmation_key_bd == $confirmation_key){
                                                    $utilisateur = new Utilisateur($nom_user,
                                                                    $prenom_user,
                                                                    $email_user,
                                                                    $tel_user,
                                                                    $adresse_user,
                                                                    $username,
                                                                    $password_user,
                                                                    $role_user, 
                                                                    $confirmation_key, 
                                                                    1
                                                    );
                                                    $utilisateurC->modifier_Utilisateur($utilisateur, $id_user);
                                                    echo "<center><h1 class='h4 text-gray-900 mb-4'  style='position:relative;margin-left:200px;
                                                    margin-top:50px; font-size:40px;'>Votre compte a bien été activé !</h1></center>";
                                                    if (isset($_SESSION['role_user']) && ($_SESSION["role_user"] == "Administrateur"))
                                                        echo '<a id="login" class="btn btn-google btn-user btn-block" style="position:relative; margin:20px 60px 20px 60px;" style= "margin-left:50%;" href="logout.php"> Connexion </a>';
                                                    else{
                                                        echo '<a id="login" class="btn btn-google btn-user btn-block" style="position:relative; margin:20px 60px 20px 60px;" href="login.php"> Connexion </a>';
                                                    }
                                                }else{
                                                    echo "<center><h1 class='h4 text-gray-900 mb-4'  style='position:relative;margin-left:40px;
                                                    margin-top:50px; font-size:40px;'>Les clés de confirmation ne correspondent pas !</h1></center>";
                                                    if (isset($_SESSION['role_user']) &&  $_SESSION["role_user"] == "Administrateur")
                                                        echo '<a id="login" class="btn btn-google btn-user btn-block" style="position:relative; margin:20px 60px 20px 60px;" href="logout.php"> Connexion </a>';
                                                    else{
                                                        echo '<a id="login" class="btn btn-google btn-user btn-block" style="position:relative; margin:20px 60px 20px 60px;" href="login.php"> Exit </a>';
                                                    }
                                                }
                                            }else{
                                                echo "<center><h1 class='h4 text-gray-900 mb-4'  style='position:relative;margin-left:200px;
                                                    margin-top:50px; font-size:40px;'>Votre compte a déjà été activé !</h1></center>";
                                                echo '<a id="login" class="btn btn-google btn-user btn-block" style="position:relative; margin:20px 60px 20px 60px;" href="logout.php"> Connexion </a>';    
                                            }
                                        }
                                    } 

                                }
                            }else 
                                header('Location:login.php'); 
                            ob_end_flush(); 

                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
	
</body>
</html>