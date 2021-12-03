<?php
	include_once "../controller/UtilisateurC.php";
	include_once '../Model/Utilisateur.php';
	
    if (isset($_REQUEST['modifier_utilisateur']))
    {
        $utilisateurC = new UtilisateurC();
        if (
            isset($_POST["nom_user"]) &&
            isset($_POST["prenom_user"]) && 
            isset($_POST["email_user"]) && 
            isset($_POST["tel_user"]) && 
            isset($_POST["adresse_user"]) &&
            isset($_POST["username"]) && 
            isset($_POST["password_user"]) && 
            isset($_POST["verifpassword_user"]) && 
            isset($_POST["role_user"]) 
        ) {

            if (
                !empty($_POST["nom_user"]) && 
                !empty($_POST["prenom_user"]) && 
                !empty($_POST["email_user"]) && 
                !empty($_POST["tel_user"]) && 
                !empty($_POST["adresse_user"]) && 
                !empty($_POST["username"]) && 
                !empty($_POST["password_user"]) && 
                !empty($_POST["verifpassword_user"]) && 
                !empty($_POST["role_user"])
            ){
                $password_user = $_POST['password_user'] ; 
                $verifpassword_user = $_POST['verifpassword_user'] ; 
                if ($password_user == $verifpassword_user){

                    $id_user = $_POST['id_user'] ; 
                    $nom_user = $_POST['nom_user'] ; 
                    $prenom_user = $_POST['prenom_user'] ; 
                    $email_user = $_POST['email_user'] ; 
                    $tel_user = $_POST['tel_user'] ;  
                    $adresse_user = $_POST['adresse_user'] ; 
                    $username = $_POST['username'] ; 
                    $password_user = $_POST['password_user'] ; 
                    $role_user = $_POST['role_user'] ;  
                    $confirmation_key = $_POST['confirmation_key'] ;  
                    $confirme = $_POST['confirme'] ;  

                    $utilisateur = new Utilisateur($nom_user,
                                    $prenom_user,
                                    $email_user,
                                    $tel_user,
                                    $adresse_user,
                                    $username,
                                    $password_user,
                                    $role_user, 
                                    $confirmation_key, 
                                    $confirme
                    );
                    $utilisateurC->modifier_Utilisateur($utilisateur, $id_user);
                }
            }
            else
                $error = "Missing information";
        }
    }
?>