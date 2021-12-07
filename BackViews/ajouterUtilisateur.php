<?php
	if(!isset($_SESSION)){
		session_start();
	}
    if (isset($_SESSION["username"]))
    {
        if ($_SESSION["role_user"] == "Utilisateur")
            header("Location:../FrontViews/front.php") ;
        else if ($_SESSION["role_user"] == "Administrateur")
        {
            include_once '../Model/Utilisateur.php';
            include_once '../Controller/UtilisateurC.php';

            if (isset($_REQUEST['ajouter_utilisateur']))
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
                        isset($_POST["role_user"]) 
                    ) {
                        if (
                            !empty($_POST["nom_user"]) && 
                            !empty($_POST["prenom_user"]) && 
                            !empty($_POST["email_user"]) && 
                            !empty($_POST["tel_user"]) && 
                            !empty($_POST["adresse_user"]) && 
                            !empty($_POST["username"]) && 
                            !empty($_POST["role_user"])
                        ){
                            echo "lkjlkjlkj";
                            $longueurKey = 15; 
                            $confirmation_key = "";
                            for ($i = 1; $i < $longueurKey ; $i++){
                                $confirmation_key .= mt_rand(0,9);
                            }

                            $nom_user = $_POST['nom_user'] ; 
                            $prenom_user = $_POST['prenom_user'] ; 
                            $email_user = $_POST['email_user'] ; 
                            $tel_user = $_POST['tel_user'] ;  
                            $adresse_user = $_POST['adresse_user'] ; 
                            $username = $_POST['username'] ; 
                            $role_user = $_POST['role_user'] ;  
                            $confirme = $_POST['confirme'] ;  

                            $utilisateur = new Utilisateur($nom_user,
                                            $prenom_user,
                                            $email_user,
                                            $tel_user,
                                            $adresse_user,
                                            $username,
                                            $username,
                                            $role_user, 
                                            $confirmation_key, 
                                            $confirme
                            );
                            
                            $utilisateurC->ajouter_Utilisateur($utilisateur);

                            // Partie Mailing 
                                $headers = 'From: testutilisateurs1@gmail.com' . "\r\n" . 
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-Type: text/html; charset=utf-8';

                            $message = 'Bonjour ' .$nom_user.' '.$prenom_user .',
                                        <br><br>
                                        Nous sommes heureux de vous avoir parmi nous. <br><br>
                                        Afin de compléter la création de votre compte, veuillez vérifier votre adresse mail en appuyant sur le lien ci dessous. 
                                        <br> 
                                        <a href = "http://localhost/Integration_Gestion_Utilisateurs/BackViews/confirmation_compte.php?username='.urlencode($username).'&confirmation_key='.$confirmation_key.'">Activez votre compte ici</a>
                                        <br><br>
                                        Cordialement.';

                            $result = mail($email_user, 
                                            "Vérification du compte", 
                                            $message, 
                                            $headers);

                            $succes = "L'utilisateur a été ajouté avec succès !";
                        }
                        header('Location:utilisateurs.php');
                    }
                }
            }
        }
    }else{
        include_once '../Model/Utilisateur.php';
        include_once '../Controller/UtilisateurC.php';
            if (isset($_REQUEST['signup']))
            {
                $NomUser_error = $_POST['NomUser_error']; 
                $PrenomUser_error = $_POST['PrenomUser_error']; 
                $EmailUser_error = $_POST['EmailUser_error']; 
                $TelUser_error = $_POST['TelUser_error']; 
                $AdresseUser_error = $_POST['AdresseUser_error']; 
                $UsernameUser_error = $_POST['UsernameUser_error']; 
                $MDPUser_error = $_POST['MDPUser_error']; 
                $MDPUser_error_2 = $_POST['MDPUser_error_2']; 
                
                if(!(($NomUser_error == 0) &&
                    ($PrenomUser_error == 0) &&
                    ($EmailUser_error == 0) &&
                    ($TelUser_error == 0) &&
                    ($AdresseUser_error == 0) &&
                    ($UsernameUser_error == 0) &&
                    ($MDPUser_error == 0) &&
                    ($MDPUser_error_2 == 0)))
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
                            $utilisateurC = new UtilisateurC();

                            $password_user = $_POST['password_user'] ; 
                            $verifpassword_user = $_POST['verifpassword_user'] ; 
                            
                            $longueurKey = 15; 
                            $confirmation_key = "";
                            for ($i = 1; $i < $longueurKey ; $i++){
                                $confirmation_key .= mt_rand(0,9);
                            }

                            if ($password_user == $verifpassword_user)
                            {
                                $nom_user = $_POST['nom_user'] ; 
                                $prenom_user = $_POST['prenom_user'] ; 
                                $email_user = $_POST['email_user'] ; 
                                $tel_user = $_POST['tel_user'] ;  
                                $adresse_user = $_POST['adresse_user'] ; 
                                $username = $_POST['username'] ; 
                                $role_user = $_POST['role_user'] ;  

                                $utilisateur = new Utilisateur($nom_user,
                                                $prenom_user,
                                                $email_user,
                                                $tel_user,
                                                $adresse_user,
                                                $username,
                                                $password_user,
                                                $role_user, 
                                                $confirmation_key, 
                                                0
                                );
                                
                                $utilisateurC->ajouter_Utilisateur($utilisateur);

                                // Partie Mailing 
                                $headers = 'From: testutilisateurs1@gmail.com' . "\r\n" . 
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-Type: text/html; charset=utf-8';

                                $message = 'Bonjour ' .$nom_user.' '.$prenom_user .',
                                            <br><br>
                                            Nous sommes heureux de vous avoir parmi nous. <br><br>
                                            Afin de compléter la création de votre compte, veuillez vérifier votre adresse mail en appuyant sur le lien ci dessous. 
                                            <br> 
                                            <a href = "http://localhost/Integration_Gestion_Utilisateurs/BackViews/confirmation_compte.php?username='.urlencode($username).'&confirmation_key='.$confirmation_key.'">Activez votre compte ici</a>
                                            <br><br>
                                            Cordialement.';

                                $result = mail($email_user, 
                                                "Vérification du compte", 
                                                $message, 
                                                $headers);
                                
                                header('Location: login.php');
                            }else {
                                echo "<p style = 'color: red;'>Les mots de passe ne correspondent pas !</p>" ;  
                            }
                        }else {
                            echo "Veuillez remplir tous les champs correctement.";
                        }
                    }
                }
            }
    }
        // header('Location:login.php');
?>