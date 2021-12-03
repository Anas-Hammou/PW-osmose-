<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once '../Model/Utilisateur.php';
    include_once '../Controller/UtilisateurC.php';

    if (isset($_REQUEST['ajouter_utilisateur']))
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
               
                $longueurKey = 15; 
                $confirmation_key = "";
                for ($i = 1; $i < $longueurKey ; $i++){
                    $confirmation_key .= mt_rand(0,9);
                }

                if ($password_user == $verifpassword_user){
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
                                <a href = "http://localhost/last/Views/confirmation_compte.php?username='.urlencode($username).'&confirmation_key='.$confirmation_key.'">Activez votre compte ici</a>
                                <br><br>
                                Cordialement.';

                    $result = mail($email_user, 
                                    "Vérification du compte", 
                                    $message, 
                                    $headers);
                }else{
                    echo "Les mots de passe ne correspondent pas !";
                }   
            }
                
            else
                $error = "Missing information";
        }
    }else if (isset($_REQUEST['signup']))
    {
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
                        <a href = "http://localhost/last/Views/confirmation_compte.php?username='.urlencode($username).'&confirmation_key='.$confirmation_key.'">Activez votre compte ici</a>
                        <br><br>
                        Cordialement.';

            $result = mail($email_user, 
                            "Vérification du compte", 
                            $message, 
                            $headers);
            
            if (isset($_SESSION['role_user']) && $_SESSION["role_user"] == "Administrateur")
                header("location:administrateur.php") ; 
            else
                header('Location:login.php');
        }else {
            echo "<p style = 'color: red;'>Les mots de passe ne correspondent pas !</p>" ;  
        }
    }
?>