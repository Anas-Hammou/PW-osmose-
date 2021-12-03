<?php
	include "../controller/UtilisateurC.php";
	include_once '../Model/Utilisateur.php';

    if (isset($_REQUEST['rechercher_utilisateur']))
    {
        if (isset($_POST["id_user"]) && (!empty($_POST["id_user"])))
        {
            $utilisateurC = new UtilisateurC();
            if (isset($_POST['id_user'])){
                $id_user = $_POST['id_user'] ;
                $utilisateur = $utilisateurC->rechercher_Utilisateur($id_user);
                $listeU = $utilisateurC->rechercher_UtilisateurID($id_user);

                $id_user = $utilisateur['id_user'] ; 
                $nom_user = $utilisateur['nom_user'] ; 
                $prenom_user = $utilisateur['prenom_user'] ; 
                $email_user = $utilisateur['email_user'] ; 
                $tel_user = $utilisateur['tel_user'] ;  
                $adresse_user = $utilisateur['adresse_user'] ; 
                $username = $utilisateur['username'] ; 
                $password_user = $utilisateur['password_user'] ; 
                $role_user = $utilisateur['role_user'] ;  
                $confirmation_key = $utilisateur['confirmation_key'] ;  
                $confirme = $utilisateur['confirme'] ;  
            }
        }
    }			
?>
