<?php 
    if(!isset($_SESSION)){
		session_start();
	} 
	if (isset($_SESSION["username"]))
	{
        if($_SESSION['confirme'] == 1){
            if ($_SESSION["role_user"] == "Administrateur")
                header("location:login.php") ; 
            else if ($_SESSION["role_user"] == "Utilisateur"){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Utilisateur</title>
    <style>
        .bouton{
        text-decoration: none;
        border: 2px solid black;
        font-size: 20px;
        color: black;
        background-color: lightgray;
        padding: 8px 80px; 
    }
    </style>
</head>
<body>
    <h1>Partie Utilisateur</h1>
    <a id="logout" class="bouton" href="logout.php"> Déconnexion </a>
    <br><br><br>
    <a style = "padding: 8px 56px;" id="desactiver" class="bouton" href="desactiver_compte.php?username=<?php echo $_SESSION['username']?>"> Désactiver Compte </a>    
</body>
</html>
<?php 
        }
    }else{
        echo "Votre compte n'a pas encore été confirmé ou a été désactivé, veuillez vérifiez vos mails !";
        header("location:logout.php") ; 
    } 
    }else 
        header("location:login.php") ; 
?>

