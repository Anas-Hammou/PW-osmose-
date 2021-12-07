<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Désactivation du compte</title>
</head>
<style>
    .bouton{
    text-decoration: none;
    border: 2px solid black;
    font-size: 20px;
    color: black;
    background-color: lightgray;
    padding: 8px 80px; 
    margin-left: 42%;
}
</style>
<body>
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
                include_once '../Mossdel/Utilisateur.php';
                include_once '../Controller/UtilisateurC.php';

                $username = $_GET['username']; 
                
                $utilisateurC = new UtilisateurC(); 
                $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($username); 

                $longueurKey = 15; 
                $confirmation_key = "";
                for ($i = 1; $i < $longueurKey ; $i++){
                    $confirmation_key .= mt_rand(0,9);
                }

                $id_user = $utilisateur['id_user'] ; 
                $nom_user = $utilisateur['nom_user'] ; 
                $prenom_user = $utilisateur['prenom_user'] ; 
                $email_user = $utilisateur['email_user'] ; 
                $tel_user = $utilisateur['tel_user'] ;  
                $adresse_user = $utilisateur['adresse_user'] ; 
                $password_user = $utilisateur['password_user'] ; 
                $role_user = $utilisateur['role_user'] ;  
                $confirme = 0 ;

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

                // Partie Mailing 
                $headers = 'From: testutilisateurs1@gmail.com' . "\r\n" . 
                'MIME-Version: 1.0' . "\r\n" .
                'Content-Type: text/html; charset=utf-8';

                $message = 'Bonjour ' .$nom_user.' '.$prenom_user .',
                            <br><br>
                            Vous venez de désactiver votre compte. Si jamais vous voulez le réactiver, veuillez appuyer sur le lien ci dessous.  
                            <br> 
                            <a href = "http://localhost/Integration_Gestion_Utilisateurs/BackViews/confirmation_compte.php?username='.urlencode($username).'&confirmation_key='.$confirmation_key.'">Réactivez votre compte ici</a>
                            <br><br>
                            Cordialement.';

                $result = mail($email_user, 
                                "Réactivation du compte", 
                                $message, 
                                $headers);

                include 'logout.php';
            }
        }else 
            header('Location:login.php');
    ob_end_flush();
?>
</body>