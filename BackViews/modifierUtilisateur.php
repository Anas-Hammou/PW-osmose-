<?php
ob_start();
if(!isset($_SESSION)){ 
    session_start();
}
    if (isset($_SESSION["username"]))
    {
        if ($_SESSION["role_user"] == "Utilisateur")
            header("Location:../FrontViews/front.php") ;
        else{
            include_once "../controller/UtilisateurC.php";
            include_once '../Model/Utilisateur.php';
            
            if (isset($_REQUEST['modifier_utilisateur']))
            {
                $IDUser_error = $_POST['IDUser_error']; 
                $NomUser_error = $_POST['NomUser_error']; 
                $PrenomUser_error = $_POST['PrenomUser_error']; 
                $EmailUser_error = $_POST['EmailUser_error']; 
                $TelUser_error = $_POST['TelUser_error']; 
                $AdresseUser_error = $_POST['AdresseUser_error']; 
                $UsernameUser_error = $_POST['UsernameUser_error']; 
                $RoleUser_error = $_POST['RoleUser_error']; 
                
                if(!(($NomUser_error == 0) &&
                    ($PrenomUser_error == 0) &&
                    ($EmailUser_error == 0) &&
                    ($TelUser_error == 0) &&
                    ($AdresseUser_error == 0) &&
                    ($UsernameUser_error == 0) &&
                    ($RoleUser_error == 0) &&
                    ($IDUser_error == 0)))
                {
                    $error = "Veuillez remplir ces champs correctement : ";
                    if ($NomUser_error == 1)
                    {
                        $error = $error ."Nom / "; 
                    }else if ($NomUser_error == 2)
                    {
                        $error = $error ."Nom (lettres uniquement) / "; 
                    }
                    if ($PrenomUser_error == 1)
                    {
                        $error = $error. "Prénom / "; 
                    }else if ($PrenomUser_error == 2)
                    {
                        $error = $error ."Prénom (lettres uniquement) / "; 
                    }
                    if ($EmailUser_error == 1)
                    {
                        $error = $error. "Email / ";
                    }else if ($EmailUser_error == 2)
                    {
                        $error = $error. "Email (Ex : test@gmail.com) / ";
                    }
                    if ($UsernameUser_error == 1)
                    {
                        $error = $error ."Nom d'utilisateur / "; 
                    }
                    if ($TelUser_error == 1)
                    {
                        $error = $error. "Téléphone / "; 
                    }else if ($TelUser_error == 2)
                    {
                        $error = $error. "Téléphone (8 chiffres) / ";
                    }
                    if ($AdresseUser_error == 1)
                    {
                        $error = $error ."Adresse / "; 
                    }
                    if ($RoleUser_error == 1)
                    {
                        $error = $error ."Rôle "; 
                    }            
                }else{
                    $error = "";
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
                                $succes = "L'utilisateur a été modifié avec succès !";

                            }
                        }
                    }
                }
            }else if (isset($_REQUEST['modifier_utilisateur_2']))
            {
                session_start();
                
                $NomUser_error = $_POST['NomUser_error']; 
                $PrenomUser_error = $_POST['PrenomUser_error']; 
                $EmailUser_error = $_POST['EmailUser_error']; 
                $TelUser_error = $_POST['TelUser_error']; 
                $AdresseUser_error = $_POST['AdresseUser_error']; 
                
                if(!(($NomUser_error == 0) &&
                    ($PrenomUser_error == 0) &&
                    ($EmailUser_error == 0) &&
                    ($TelUser_error == 0) &&
                    ($AdresseUser_error == 0)))
                {
                    // $_SESSION['modifier_1'] = 0;
                    $_SESSION["modifier_1"] = "Veuillez remplir ces champs correctement : ";
                    if ($NomUser_error == 1)
                    {
                        $error1 = $error1 ."Nom / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"] ."Nom / "; 
                    }else if ($NomUser_error == 2)
                    {
                        $error1 = $error1 ."Nom (lettres uniquement) / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"] ."Nom (lettres uniquement) / "; 
                    }
                    if ($PrenomUser_error == 1)
                    {
                        $error1 = $error1. "Prénom / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"]. "Prénom / "; 
                    }else if ($PrenomUser_error == 2)
                    {
                        $error1 = $error1 ."Prénom (lettres uniquement) / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"] ."Prénom (lettres uniquement) / "; 
                    }
                    if ($EmailUser_error == 1)
                    {
                        $error1 = $error1. "Email / ";
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"]. "Email / ";
                    }else if ($EmailUser_error == 2)
                    {
                        $error1 = $error1. "Email (Ex : test@gmail.com) / ";
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"]. "Email (Ex : test@gmail.com) / ";
                    }
                    if ($TelUser_error == 1)
                    {
                        $error1 = $error1. "Téléphone / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"]. "Téléphone / "; 
                    }else if ($TelUser_error == 2)
                    {
                        $error1 = $error1. "Téléphone (8 chiffres) / ";
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"]. "Téléphone (8 chiffres) / ";
                    }
                    if ($AdresseUser_error == 1)
                    {
                        $error1 = $error1 ."Adresse / "; 
                        $_SESSION["modifier_1"] = $_SESSION["modifier_1"] ."Adresse / "; 
                    }         
                }else
                {
                    $_SESSION["modifier_1"] = 1;

                    $error1 = "";
                    $utilisateurC = new UtilisateurC();
                    if (
                        isset($_POST["nom_user"]) &&
                        isset($_POST["prenom_user"]) && 
                        isset($_POST["email_user"]) && 
                        isset($_POST["tel_user"]) && 
                        isset($_POST["adresse_user"]) &&
                        isset($_POST["username"])
                    ){

                        if (
                            !empty($_POST["nom_user"]) && 
                            !empty($_POST["prenom_user"]) && 
                            !empty($_POST["email_user"]) && 
                            !empty($_POST["tel_user"]) && 
                            !empty($_POST["adresse_user"]) && 
                            !empty($_POST["username"])
                        ){

                            $id_user = $_POST['id_user'] ; 
                            $utilisateur = $utilisateurC->rechercher_Utilisateur($id_user);

                            $nom_user = $_POST['nom_user'] ; 
                            $prenom_user = $_POST['prenom_user']  ; 
                            $email_user = $_POST['email_user']  ; 
                            $tel_user = $_POST['tel_user']  ;  
                            $adresse_user = $_POST['adresse_user']  ; 
                            $username = $_POST['username']  ; 
                            $password_user = $utilisateur['password_user'] ; 
                            $role_user = $utilisateur['role_user'] ;  
                            $confirmation_key = $utilisateur['confirmation_key'] ;  
                            $confirme = $utilisateur['confirme'] ;  

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
                            $succes1 = "Votre compte a été modifié avec succès !";
                        }
                        
                        }
                    }
                    session_start();
                    header('Location: compteAdministrateur.php');

            }else if (isset($_REQUEST['modifier_utilisateur_3']))
            {
                session_start();

                $utilisateurC = new UtilisateurC();
                if (
                    isset($_POST["confirmer_nv_mdp"]) && 
                    isset($_POST["ancien_mdp"]) && 
                    isset($_POST["nouveau_mdp"]) 
                ) {
                    if (empty($_POST["confirmer_nv_mdp"])&&
                        empty($_POST["ancien_mdp"]) && 
                        empty($_POST["nouveau_mdp"])
                    ){
                        $_SESSION["modifier_2"] = "Veuillez remplir ces champs correctement : ";
                        if (empty($_POST["ancien_mdp"])){
                            $_SESSION["modifier_2"] = $_SESSION["modifier_1"]. "Ancien mot de passe / "; 
                        }else if (empty($_POST["nouveau_mdp"])){
                            $_SESSION["modifier_2"] = $_SESSION["modifier_1"]. "Nouveau mot de passe / "; 
                        }else if (empty($_POST["confirmer_nv_mdp"])){
                            $_SESSION["modifier_2"] = $_SESSION["modifier_1"]. "Confirmation du nouveau mot de passe "; 
                        }
                    }

                        $username = $_POST['username'];
                        $nouveau_mdp_user = $_POST['nouveau_mdp'] ; 
                        $ancien_mdp_user = $_POST['ancien_mdp'] ; 
                        $verifpassword_user = $_POST['confirmer_nv_mdp'] ; 

                        $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($_POST['username']);

                        $password_user = $utilisateur['password_user'] ; 

                        if ($password_user == $ancien_mdp_user)
                        {
                            if ($nouveau_mdp_user == $verifpassword_user)
                            {
                                if (strlen($nouveau_mdp_user) > 8){
                                    $id_user = $utilisateur['id_user'] ; 
                                    $nom_user = $utilisateur['nom_user'] ; 
                                    $prenom_user = $utilisateur['prenom_user'] ; 
                                    $email_user = $utilisateur['email_user'] ; 
                                    $tel_user = $utilisateur['tel_user'] ;  
                                    $adresse_user = $utilisateur['adresse_user'] ; 
                                    $username = $utilisateur['username'] ; 
                                    $password_user = $nouveau_mdp_user ; 
                                    $role_user = $utilisateur['role_user'] ;  
                                    $confirmation_key = $utilisateur['confirmation_key'] ;  
                                    $confirme = $utilisateur['confirme'] ;  

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
                                    $_SESSION["modifier_2"] = 1;
                                }else{
                                    $_SESSION["modifier_2"] = "Le mot de passe doit contenir au minimum 8 caractères !"; 
                                }
                            }else{
                                $_SESSION["modifier_2"] = "Les nouveaux mots de passe ne correspondent pas !"; 
                            }
                        }else{
                            $_SESSION["modifier_2"] = "L'ancien mot de passe saisi n'est pas le bon !"; 
                        }
                    }
                header('Location: compteAdministrateur.php');
            }
        }
    }else 
        header('Location:login.php');
ob_end_flush(); 
?>