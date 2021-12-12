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
  
                include_once '../Controller/UtilisateurC.php';

                $utilisateurC = new UtilisateurC() ; 

                if (isset($_REQUEST['trier_utilisateurs'])) {
                    $sortselect = $_POST["sortselect"] ;
                    if ($sortselect == "tri_id" ) 
                    {
                        $listeU = $utilisateurC->trier_UtilisateurId() ;     
                    } else if ($sortselect == "tri_nom")
                    {
                        $listeU = $utilisateurC->trier_UtilisateurNom() ;
                    }
                    else if ($sortselect == "tri_username")
                    {
                        $listeU = $utilisateurC->trier_UtilisateursUsername() ;
                    }
                }else if (isset($_REQUEST['rechercher_utilisateur'])){
                    $id_user = $_POST['id_user'];
                    $listeU = $utilisateurC->rechercher_UtilisateurID($id_user);
                }else {
                    $listeU = $utilisateurC->afficher_Utilisateur();
                }
?>
<head>
    <title>Utilisateurs</title>
    <style>
        .table {
            border:1px solid black;
            border-collapse:collapse;
            color : black ;
            font-weight: bold ;
            text-align: center ;   
            width : 150px;
        }
</style>
</head>
<body>
    <table style="border:1px solid black;border-collapse:collapse; vertical-align:center; ">
    <tr class="table" style="border:1px solid black;border-collapse:collapse;">
        <td class="table" >ID</td>
        <td class="table">Nom</td>
        <td class="table">Prénom</td>
        <td class="table">Email</td>
        <td class="table">Téléphone</td>
        <td class="table">Adresse</td>
        <td class="table">Username</td>
        <!-- <td class="table">Mot de passe</td> -->
        <td class="table">Rôle</td>
        <td class="table">Etat Compte</td>
    </tr>
        <?php
            foreach($listeU as $user) {
        ?>
            <tr style="border:1px solid black;border-collapse:collapse; vertical-align:center; text-align:center;">
                <td><?php echo $user['id_user']; ?></td>
                <td><?php echo $user['nom_user']; ?></td>
                <td><?php echo $user['prenom_user']; ?></td>
                <td><?php echo $user['email_user']; ?></td>
                <td><?php echo $user['tel_user']; ?></td>
                <td><?php echo $user['adresse_user']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <!-- <td><?php echo $user['password_user']; ?></td> -->
                <td><?php echo $user['role_user']; ?></td>
                <?php 
                    if ($user['confirme'] == 1){ ?>
                        <td>Activé</td>
                <?php }else if ($user['confirme'] == 0){ ?>
                        <td>Non Activé</td>
                <?php } ?>
            </tr>
        <?php 
            }
        }
        }else 
            header('Location:login.php');
        ob_end_flush(); 
        ?>
    </table>
</body>